<?php

use SilverStripe\Dev\BuildTask;
use DNADesign\Elemental\Models\BaseElement;
use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\ORM\DB;
use SilverStripe\ORM\Queries\SQLSelect;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Blog\Model\BlogPost;
class MigrateBlocksToElementalTask extends BuildTask{

	protected $title = 'Migrate blocks to elements';
	protected $description = 'Converts legacy blocks to new elemental module blocks';

	protected $enabled = true;

	function run($request){

		echo '<h2>Ensuring all pages have appropriate ElementAreas (saving and conditionally publishing all pages)</h2>';
		//print_r(BlogPost::class);
		$allPages = SiteTree::get()->filter('ClassName:not', BlogPost::class);
		foreach($allPages as $allPage){
			echo '<p>Working on page '.$allPage->Title.' ('.$allPage->ClassName.')</p>';
			$allPage->write();
			if($allPage->isPublished()){
				$allPage->publish('Stage', 'Live');
			}
		}

		echo '<p>Done.</p>';

		echo '<p>Ensuring all blocks have entries in the Element table....</p>';
		$blocks = Block::get();
		echo '<ul>';
		//print_r($blocks->toArray());

		foreach($blocks as $block){
			$elementTest = BaseElement::get()->filter(array('ID' => $block->ID))->First();

			if(!$elementTest){
				echo '<li>Creating element for '.$block->ID.'</li>';
				$newElement = new BaseElement();
				$newElement->ID = $block->ID;
				$newElement->Title = $block->Title;
				$newElement->Sort = $block->Sort;
				$newElement->ClassName = $block->ClassName;
				$newElement->ShowTitle = $block->ShowTitle;
				$newElement->write();
				$newElement->publish('Stage', 'Live');
			}

		}
		echo '</ul>';
		echo '<p>Done</p>';
		echo '<h2>Gathering base elements and current element areas..</h2>';
		$elements = BaseElement::get();
		$elementAreaNames = array(
			'BeforeContent' => 'BeforeContent',
			'BeforeContentConstrained' => 'BeforeContentConstrained',
			'AfterContent' => 'AfterContent',
			'AfterContentConstrained' => 'AfterContentConstrained',
			'SidebarArea' => 'SidebarArea'

		);

		
		//print_r($elements->toArray());
		echo '<ul>';
		foreach($elements as $element){
			$elementID = $element->ID;
			
			$query = new SQLSelect();
			$results = $query->setFrom('SiteTree_Blocks')->setSelect('*')->setWhere("\"BlockID\" = '".$elementID."'")->execute();

			 //print_r($results->table());
			foreach($results as $result){

				if($result['BlockArea'] == 'Sidebar'){
					$result['BlockArea'] = 'SidebarArea';
				}
				//print_r($result);
				$page = SiteTree::get()->filter(array('ID' => $result['SiteTreeID']))->First();

				if($page){

					// if(array_key_exists($result['BlockArea'], $elementAreaNames)){
						print_r('element <strong>'.$element->Title.'</strong> on page '.$page->Title.' goes into '.$result['BlockArea'].' '.$page->{$elementAreaNames[$result['BlockArea']].'ID'}. '<br />');						
					// }

					print_r('relation id: '.'('.$result['BlockArea'].'ID'.') '.$page->obj($result['BlockArea'])->ID.'<br />');

					$elementQuery = new SQLSelect();
					$elementResult = $elementQuery->setFrom('ContentBlock')->setSelect('*')->setWhere("\"ID\" = '".$elementID."'")->execute()->first();

					// print_r($elementResult);

					$newElement = $element->duplicate(false);
					$newElement->ParentID = $page->obj($result['BlockArea'])->ID;
					$newElement->Sort = $result['Sort'];
					$newElement->HTML = $elementResult['Content'];
					$newElement->write();
					//print_r($newElement);
					if($element->isPublished()){
						$newElement->publish('Stage', 'Live');
					}



				}
			}




		}
		echo '</ul>';

	}

}
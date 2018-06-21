<?php

use SilverStripe\Dev\BuildTask;
use DNADesign\Elemental\Models\BaseElement;
use DNADesign\Elemental\Models\ElementArea;
use SilverStripe\ORM\DB;
use SilverStripe\ORM\Queries\SQLSelect;
use SilverStripe\CMS\Model\SiteTree;
class MigrateBlocksToElementalTask extends BuildTask{

	protected $title = 'Migrate blocks to elements';
	protected $description = 'Converts legacy blocks to new elemental module blocks';

	protected $enabled = true;

	function run($request){

		echo '<p>Ensuring all pages have appropriate ElementAreas (saving and conditionally publishing all pages)</p>';

		$allPages = SiteTree::get()->exclude(array('ClassName' =>'NewsEntry'));
		foreach($allPages as $allPage){
			echo '<p>Working on page '.$allPage->Title.'</p>';
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
				$newElement->write();
				if($block->Published){
					$newElement->publish('Stage', 'Live');
				}
			}

		}
		echo '</ul>';
		echo '<p>Done</p>';
		echo '<p>Gathering base elements and current element areas..</p>';
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
				print_r($result);
				$page = SiteTree::get()->filter(array('ID' => $result['SiteTreeID']))->First();

				if($page){

					// if(array_key_exists($result['BlockArea'], $elementAreaNames)){
						print_r('element <strong>'.$element->Title.'</strong> on page '.$page->Title.' goes into '.$result['BlockArea'].' '.$page->{$elementAreaNames[$result['BlockArea']].'ID'}. '<br />');						
					// }


					// $element->ParentID = $page->{$elementAreaNames[$result['BlockArea']].'ID'};
					// $element->write();

				}
			}

		}
		echo '</ul>';

	}

}
<?php

class RemoveH1sTask extends BuildTask{

	protected $title = 'Remove h1s from $Content';
	protected $description = 'Removes all first h1 tags from the $Content fields on this site';

	protected $enabled = true;

	function run($request){
		echo '<p>Gathering all pages..</p>';
		$pages = SiteTree::get();
		echo '<ul>';
		foreach($pages as $page){

			$pageContent = $page->Content;

			if($pageContent != ''){
				$doc = new DOMDocument('1.0', 'UTF-8');
				/*$doc->loadHTML('<?xml version="1.0" encoding="UTF-8"?>' . "\n" .$pageContent);*/
				$doc->loadHTML(mb_convert_encoding($pageContent, 'HTML-ENTITIES', 'UTF-8'));
				$headings = $doc->getElementsByTagName('h1');
				$heading = $headings->item(0);

				// echo $items->item(0)->textContent;
				if($heading){
					//print_r($heading->parentNode);
					echo '<li>Working on page <strong>'.$page->Title.'</strong> h1 finder found and removed this node: <em>'.$heading->textContent.'</em></li>';

					$heading->parentNode->removeChild($heading);
					$html = $doc->saveHTML();


					/*str_replace('<?xml version="1.0" encoding="UTF-8"?>', '',$html);*/
					// print_r($html);
					$page->Content = $html;
				}else{
					echo '<li>Working on page <strong>'.$page->Title.'</strong> and <strong>no h1 was found...</strong></li>';
				}

			}

			$page->write();

			if($page->isPublished()){
				$page->publish('Stage', 'Live');
			}
					
		}
		echo '</ul>';

	}

}
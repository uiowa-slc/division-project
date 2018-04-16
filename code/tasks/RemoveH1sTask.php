<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Dev\BuildTask;

class RemoveH1sTask extends BuildTask{

	protected $title = 'Remove h1s from $Content';
	protected $description = 'Removes all first h1 tags from the $Content fields on this site';

	protected $enabled = true;

	function run($request){
		echo '<p>Gathering all pages..</p>';
		$pages = SiteTree::get();
		echo '<ul>';
		$matches = array();
		if($pages->Count() == 0){
			echo '<li>all h1s have been destroyed, captain.</li>';
			echo '</ul>';
			return ;
		}
		foreach($pages as $page){

			$pageContent = $page->Content;
			if (preg_match('{<h1(\s[^<>]*)?>(.*?)</h1>}', $pageContent, $matches)){
				echo '<li>Match found on <a href="'.$page->Link().'" target="_blank">'.$page->Title.'</a>, removing in-content h1: "'.htmlentities($matches[0]).'".';

				$htmlReplaced = preg_replace('{<h1(\s[^<>]*)?>(.*?)</h1>}', '', $pageContent);

				//print_r($htmlReplaced);
				$page->Content = $htmlReplaced;
				// echo '<ul><li><pre>';
				// print_r($page->Content);
				// echo '</pre></li></ul>';
				$page->write();

				if($page->isPublished()){
					$page->publish('Stage', 'Live');
				}
			}
			// print_r($matches);
					
		}
		echo '</ul>';
		echo '<p>Done.</p>';

	}

}
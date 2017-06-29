<?php

class MigrateSidebarItemsTask extends BuildTask{

	protected $title = 'Migrate legacy sidebar items';
	protected $description = 'Converts legacy sidebar items to content blocks';

	protected $enabled = true;

	function run($request){
		echo '<p>Gathering sidebar items..</p>';
		$sidebarItems = SidebarItem::get();
		echo '<ul>';
		foreach($sidebarItems as $sidebarItem){

			$newBlock = ContentBlock::create();

			$newBlock->Title = $sidebarItem->Title;
			$newBlock->Content = $sidebarItem->obj('Content')->getValue();
			$newBlock->ImageID = $sidebarItem->ImageID;
			$newBlock->ExternalLink = $sidebarItem->ExternalLink;
			$newBlock->LinkedPageID = $sidebarItem->AssociatedPageID;
			$newBlock->RSSFeedLink = $sidebarItem->RSSFeedLink;
			$newBlock->BlockArea = 'Sidebar';
			$newBlock->Published = 1;

			$newBlock->write();
			$newBlock->publish('Stage', 'Live');		
			

			foreach($sidebarItem->Pages() as $sidebarItemPage){
				$sidebarItemPage->Blocks()->add($newBlock, $extraFields = array('BlockArea' => 'Sidebar', 'Sort' => $sidebarItem->SortOrder));
			}

			// Debug::show($newBlock->Pages());
			


			$sidebarItem->delete();

			echo '<li>Created and published block <strong>'.$newBlock->Title.'</strong></li>';
		}

	}

}
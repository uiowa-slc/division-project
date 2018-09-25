<?php

use SilverStripe\Dev\BuildTask;
use DNADesign\Elemental\Models\BaseElement;
use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\ORM\DB;
use SilverStripe\ORM\Queries\SQLSelect;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Blog\Model\BlogPost;
class PublishElementalAreasTask extends BuildTask{

	protected $title = 'Publishes all elemental areas';
	protected $description = 'Run AFTER MigrateBlocksToElemental';

	protected $enabled = true;

	function run($request){

		echo '<h2>publishing all elemental areas</h2>';

		$areas = ElementalArea::get();

		foreach($areas as $area){
			$area->publish('Stage','Live');
		}
	}

}
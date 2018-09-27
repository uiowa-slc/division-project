<?php

use SilverStripe\Dev\BuildTask;
use DNADesign\Elemental\Models\BaseElement;
use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\ORM\DB;
use SilverStripe\ORM\Queries\SQLSelect;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Widgets\Model\WidgetArea;
class PublishWidgetAreasTask extends BuildTask{

	protected $title = 'Publishes all widget areas';
	protected $description = '';

	protected $enabled = true;

	function run($request){

		echo '<h2>publishing all elemental areas</h2>';

		$areas = WidgetArea::get();

		foreach($areas as $area){
			$area->publish('Stage','Live');
		}
	}

}
<?php

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

class HomePageBackgroundFeature extends DataObject {

	private static $db = array(
		'Tagline' => 'Text',
		'Buttons' => 'HTMLText',
	);

	private static $has_one = array(
		'Image' => Image::class,
		'HomePage' => 'HomePage',
	);
    private static $owns = array(
    	'Image'
    );
	private static $plural_name = "Background Images and Taglines";

	private static $singular_name = "Background Image and Tagline";

	private static $summary_fields = array(
		"Tagline",
		"Thumbnail",
	);

	function getThumbnail() {
		return $this->Image()->CMSThumbnail();
	}

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->renameField("Buttons", "Buttons (Unordered List with Links)");
		//$fields->fieldByName("Buttons")->setRows(3);
		return $fields;
	}

}
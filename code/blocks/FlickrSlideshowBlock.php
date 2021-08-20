<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class FlickrSlideshowBlock extends BaseElement {

	private static $db = array(
		'FlickrEmbed' => 'HTMLText',
	);

	private static $has_one = array(

	);
	private static $has_many = array(

	);

	private static $defaults = array(

	);
	private static $table_name = 'FlickrSlideshowBlock';

	public function getType() {
		return 'Flickr Slideshow Block';
	}

	public function getCMSFields() {
		$this->beforeUpdateCMSFields(function (FieldList $fields) {

			$fields->addFieldToTab('Root.Main', new TextField('FlickrEmbed', 'Flickr Album Embed Code'));

		});

		return parent::getCMSFields();
	}

}

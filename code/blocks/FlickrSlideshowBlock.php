<?php

use SilverStripe\Forms\TextField;

class FlickrSlideshowBlock extends Block{

	private static $db = array(
		'FlickrEmbed' => 'HTMLText',
	);

	private static $has_one = array(


	);
	private static $has_many = array(
		
	);

	private static $defaults = array(

	);
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', new TextField('FlickrEmbed', 'Flickr Album Embed Code'));

		return $fields;
	}

}
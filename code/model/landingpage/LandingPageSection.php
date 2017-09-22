<?php
class LandingPageSection extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(155)',
		'Content' => 'HTMLText',
		'SortOrder' => 'Int',
		'VideoID' => 'Varchar(11)'

	);

	private static $has_one = array(
		'LandingPage' => 'LandingPage'
	);

	private static $has_many = array(
		'Images' => 'Image'
	);

	private static $default_sort = array(
		'SortOrder'
	);
	//public static $allowed_children = array ("BranchPersonPage");

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName("SortOrder");
		$fields->removeByName("Images");

		$fields->addFieldToTab('Root.Main', UploadField::create('Images'));
		$fields->addFieldToTab('Root.Main', YouTubeField::create('VideoID', 'YouTube Video'));
		return $fields;
	}

}

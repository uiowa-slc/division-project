<?php
class LandingPageSection extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(155)',
		'Content' => 'HTMLText',
		'SortOrder' => 'Int',
		'VideoID' => 'Varchar(11)',
		'EventSearchTerm' => 'Varchar(155)'

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

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName("SortOrder");
		$fields->removeByName("Images");


		$fields->addFieldToTab('Root.Main', TextField::create('EventSearchTerm', 'Show Localist events with this search term (can be a tag or category)'));
		$fields->addFieldToTab('Root.Main', SortableUploadField::create('Images'));
		$fields->addFieldToTab('Root.Main', YouTubeField::create('VideoID', 'YouTube Video'));
		return $fields;
	}

	public function EventList(){
		if($term = $this->EventSearchTerm){
			$calendar = LocalistCalendar::getOrCreate();
			return $calendar->EventListBySearchTerm($term);
		}
		return false;
	}

}

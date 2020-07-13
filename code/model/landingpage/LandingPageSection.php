<?php

use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\View\Parsers\URLSegmentFilter;
use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use Bummzack\SortableFile\Forms\SortableUploadField;
use EdgarIndustries\YouTubeField\YouTubeField;

class LandingPageSection extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(155)',
		'Content' => 'HTMLText',
		'SortOrder' => 'Int',
		'VideoID' => 'Varchar(11)',
		'CalendarID' => 'Int',
		'FullImagePopup' => 'Boolean'

	);

	private static $has_one = array(
		'LandingPage' => 'LandingPage'
	);

	private static $has_many = array(
		'Images' => Image::class
	);

	private static $default_sort = array(
		'SortOrder'
	);
	private static $extensions = [
        Versioned::class
    ];

    private static $singular_name = 'Section';
    private static $plural_name = 'Sections';
	//public static $allowed_children = array ("BranchPersonPage");

	public function getCMSFields() {


		$landingPage = LandingPage::get()->filter(array('ID' => $this->LandingPageID))->First();

		$fields = parent::getCMSFields();
		$fields->removeByName("SortOrder");
		$fields->removeByName("Images");

		if($landingPage){
		$fields->addFieldToTab('Root.Main', LiteralField::create('LandingPageLink', '<p><a href="'.$landingPage->PreviewLink().'?stage=Stage'.'#'.$this->NiceTitle().'"" target="_blank" rel="noopener">'.$landingPage->PreviewLink().'</a></p>'), 'Content');


		}

		$fields->addFieldToTab('Root.Main', DropdownField::create('CalendarID', 'Choose a calendar to retrieve events from (you may need to create a UiCalendar page on this site)', UiCalendar::get()->map())->setEmptyString('(No calendar selected'));

		$fields->addFieldToTab('Root.Main', SortableUploadField::create('Images'));
		$fields->addFieldToTab('Root.Main', new CheckboxField('FullImagePopup', 'Enable Full Image Popups'));
		$fields->addFieldToTab('Root.Main', YouTubeField::create('VideoID', 'YouTube Video'));
		return $fields;
	}

	public function NiceTitle(){
		$filter = new URLSegmentFilter();
		return $filter->filter($this->owner->Title);
	}
	public function EventList(){
		$calendar = UiCalendar::get()->filter(array('ID' => $this->CalendarID))->First();

		if($calendar){

			return $calendar->EventList();
		}
	}

}

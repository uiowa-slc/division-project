<?php

use SilverStripe\Forms\DropdownField;
use DNADesign\Elemental\Models\BaseElement;
use UncleCheese\DisplayLogic\Wrapper;
class UpcomingEventsBlock extends BaseElement{

	private static $db = array(
		'LimitEvents' => 'Int',
		'Source' => 'Enum(array("Localist calendar on this site","SilverStripe calendar on this site","General Interest","Type","Venue","Department","Search term"))',
		'EventTypeFilterID'       => 'Int',
		'DepartmentFilterID'      => 'Int',
		'VenueFilterID'           => 'Int',
		'GeneralInterestFilterID' => 'Int',
		'SearchTerm' => 'Varchar(255)'
	);

	private static $has_one = array(

	);
    private static $table_name = 'UpcomingEventsBlock';

    public function getType()
    {
        return 'Upcoming Events Block';
    }

	private static $defaults = array(
		'LimitEvents' => 3
	);
	public function EventList(){
		$calendar = $this->Calendar();
		$numEvents = $this->LimitEvents;

		$eventList = $calendar->EventListLimited($numEvents);

		return $eventList;
	}
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('Source');
		$calendar = LocalistCalendar::getOrCreate();

		$ssCalendar = Calendar::get()->First();

		$sourceArray = singleton('UpcomingEventsBlock')->dbObject('Source')->enumValues();

		$types      = $calendar->TypeList();
		$typesArray = $types->map();

		$departments      = $calendar->DepartmentList();
		$departmentsArray = $departments->map();

		$venues      = $calendar->VenuesList();
		$venuesArray = $venues->map();

		$genInterests      = $calendar->GeneralInterestList();
		$genInterestsArray = $genInterests->map();	

		$fields->renameField('Title', 'Title (default:Upcoming Events)');

		if(!$calendar->IsInDB()){
			unset($sourceArray['Localist calendar on this site']);
		}

		if(!$ssCalendar){
			unset($sourceArray['SilverStripe calendar on this site']);
		}
		$sourceField = DropdownField::create('Source', 'Event source', $sourceArray);

		$fields->addFieldToTab('Root.Main', $sourceField);

		$genInterestDropDownField = new DropdownField('GeneralInterestFilterID', 'Filter entire UI calendar by this general interest', $genInterestsArray);
		$genInterestDropDownField->setEmptyString('(No Filter)');

		$typeListBoxField = new DropdownField('EventTypeFilterID', 'Filter the calendar by this Localist event type:', $typesArray);
		$typeListBoxField->setEmptyString('(No Filter)');

		$departmentDropDownField = new DropdownField('DepartmentFilterID', 'Filter the calendar by this Localist department', $departmentsArray);
		$departmentDropDownField->setEmptyString('(No Filter)');

		$venueDropDownField = new DropdownField('VenueFilterID', 'Filter the calendar by this Localist Venue', $venuesArray);
		$venueDropDownField->setEmptyString('(No Filter)');

		$genInterestDropDownField = new DropdownField('GeneralInterestFilterID', 'Filter the calendar by this Localist General Interest', $genInterestsArray);
		$genInterestDropDownField->setEmptyString('(No Filter)');

		$searchTermField = new TextField('SearchTerm', 'Search term');

		$fields->addFieldToTab('Root.Main', $typeListBoxField);
		$fields->addFieldToTab(' Root.Main', $departmentDropDownField);
		$fields->addFieldToTab(' Root.Main', $venueDropDownField);
		$fields->addFieldToTab(' Root.Main', $genInterestDropDownField);
		$fields->addFieldToTab(' Root.Main', $searchTermField);

		$genInterestDropDownField->displayIf('Source')->isEqualTo('General Interest');
		$venueDropDownField->displayIf('Source')->isEqualTo('Venue');
		$departmentDropDownField->displayIf('Source')->isEqualTo('Department');
		$typeListBoxField->displayIf('Source')->isEqualTo('Type');
		$searchTermField->displayIf('Source')->isEqualTo('Search term');


		return $fields;
	}

	public function Calendar(){
		
		if($this->Source == 'Localist calendar on this site'){
			$calendar = LocalistCalendar::get()->First();
			return $calendar;
		}elseif($this->Source == 'SilverStripe calendar on this site'){
			$calendar = Calendar::get()->First();
			return $calendar;
		}

		$calendar = LocalistCalendar::create();
		
		$generalInterestId = $this->GeneralInterestFilterID;
		$typeId = $this->EventTypeFilterID;
		$venueId = $this->VenueFilterID;
		$deptId = $this->DepartmentFilterID;
		$searchTerm = $this->SearchTerm;

		if($this->Source == 'General Interest'){
			$calendar->GeneralInterestFilterID = urlencode($generalInterestId);
		}elseif($this->Source == 'Type'){
			$calendar->EventTypeFilterID = urlencode($typeId);
		}elseif($this->Source == 'Venue'){
			$calendar->VenueFilterID = urlencode($venueId);
		}elseif($this->Source == 'Department'){
			$calendar->DepartmentFilterID = urlencode($deptId);
		}elseif($this->Source == 'Search term'){
			$calendar->SearchTerm = urlencode($searchTerm);
		}

		return $calendar;
	}


}
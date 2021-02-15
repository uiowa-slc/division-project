<?php

use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;
use DNADesign\Elemental\Models\BaseElement;
use UncleCheese\DisplayLogic\Wrapper;
class UpcomingEventsBlock extends BaseElement{

	private static $db = array(
		'LimitEvents' => 'Int',
		'Source' => 'Enum(array("Ui calendar on this site","General Interest","Type","Venue","Department","Keyword"))',
		'EventTypeFilterID'       => 'Int',
		'DepartmentFilterID'      => 'Int',
		'VenueFilterID'           => 'Int',
		'GeneralInterestFilterID' => 'Int',
        'KeywordFilterID' => 'Int',
		'SearchTerm' => 'Varchar(255)',
        'CalendarLink' => 'Varchar(255)',
        'HideImages' => 'Boolean',
        'ShowStacked' => 'Boolean',
        'Enclosed' => 'Boolean',
        'BlockColor' => 'Enum(array("bg--white", "bg--light", "bg--highlight", "bg--highlight--pattern--brain")',
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
        $fields->removeByName('SearchTerm');
		$calendar = UiCalendar::getOrCreate();

		$sourceArray = singleton('UpcomingEventsBlock')->dbObject('Source')->enumValues();

		$types      = $calendar->TypeList();
		$typesArray = $types->map();

		$departments      = $calendar->DepartmentList();
		$departmentsArray = $departments->map();

		$venues      = $calendar->VenuesList();
		$venuesArray = $venues->map();

		$genInterests      = $calendar->GeneralInterestList();
		$genInterestsArray = $genInterests->map();

        $keywords      = $calendar->KeywordList();
        $keywordArray = $keywords->map();

		$fields->renameField('Title', 'Title (default:Upcoming Events)');

		if(!$calendar->IsInDB()){
			unset($sourceArray['Ui calendar on this site']);
		}

		$sourceField = DropdownField::create('Source', 'Event source', $sourceArray);

		$fields->addFieldToTab('Root.Main', $sourceField);

		$genInterestDropDownField = new DropdownField('GeneralInterestFilterID', 'Filter entire UI calendar by this general interest', $genInterestsArray);
		$genInterestDropDownField->setEmptyString('(No Filter)');

		$typeListBoxField = new DropdownField('EventTypeFilterID', 'Filter the calendar by this Ui event type:', $typesArray);
		$typeListBoxField->setEmptyString('(No Filter)');

		$departmentDropDownField = new DropdownField('DepartmentFilterID', 'Filter the calendar by this Ui department', $departmentsArray);
		$departmentDropDownField->setEmptyString('(No Filter)');

		$venueDropDownField = new DropdownField('VenueFilterID', 'Filter the calendar by this Ui Venue', $venuesArray);
		$venueDropDownField->setEmptyString('(No Filter)');

		$genInterestDropDownField = new DropdownField('GeneralInterestFilterID', 'Filter the calendar by this Ui General Interest', $genInterestsArray);
		$genInterestDropDownField->setEmptyString('(No Filter)');

        $keywordDropDownField = new DropdownField('KeywordFilterID', 'Filter the calendar by this UiCalendar Keyword', $keywordArray);
        $keywordDropDownField->setEmptyString('(No Filter)');

		$searchTermField = new TextField('SearchTerm', 'Search term');

		$fields->addFieldToTab('Root.Main', TextField::create('CalendarLink', '"See all Events link"'));

		$fields->addFieldToTab('Root.Main', $typeListBoxField);
		$fields->addFieldToTab(' Root.Main', $departmentDropDownField);
		$fields->addFieldToTab(' Root.Main', $venueDropDownField);
		$fields->addFieldToTab(' Root.Main', $genInterestDropDownField);
        $fields->addFieldToTab(' Root.Main', $keywordDropDownField);
        //Disabled search term field until we can search UiCalendar api
		// $fields->addFieldToTab(' Root.Main', $searchTermField);

		$genInterestDropDownField->displayIf('Source')->isEqualTo('General Interest');
		$venueDropDownField->displayIf('Source')->isEqualTo('Venue');
		$departmentDropDownField->displayIf('Source')->isEqualTo('Department');
		$typeListBoxField->displayIf('Source')->isEqualTo('Type');
		// $searchTermField->displayIf('Source')->isEqualTo('Search term');
        $keywordDropDownField->displayIf('Source')->isEqualTo('Keyword');

        $fields->addFieldToTab(
			'Root.Main',
			DropdownField::create('BlockColor', 'Background Color')
				->setSource(
					array(
                        'bg--white' => 'White',
                        'bg--light' => 'Gray',
                        'bg--highlight' => 'Gold',
                        'bg--highlight--pattern--brain' => 'Gold Brain Rock',
					)
				)
		);

        $fields->addFieldToTab('Root.Main', new CheckboxField('HideImages', 'Hide Images'));
        $fields->addFieldToTab('Root.Main', new CheckboxField('ShowStacked', 'Use Stacked Layout'));
        $fields->addFieldToTab('Root.Main', new CheckboxField('Enclosed', 'Enclose Cards'));

		return $fields;
	}

	public function Calendar(){
		if($this->Source == 'Ui calendar on this site'){
			$calendar = UiCalendar::get()->First();
			return $calendar;
		}

		$calendar = UiCalendar::create();

		$generalInterestId = $this->GeneralInterestFilterID;
		$typeId = $this->EventTypeFilterID;
		$venueId = $this->VenueFilterID;
		$deptId = $this->DepartmentFilterID;
        $keyword = $this->KeywordFilterID;
		$searchTerm = $this->SearchTerm;

		if($this->Source == 'General Interest'){
			$calendar->GeneralInterestFilterID = urlencode($generalInterestId);
		}elseif($this->Source == 'Type'){
			$calendar->EventTypeFilterID = urlencode($typeId);
		}elseif($this->Source == 'Venue'){
			$calendar->VenueFilterID = urlencode($venueId);
		}elseif($this->Source == 'Department'){
			$calendar->DepartmentFilterID = urlencode($deptId);
        }elseif($this->Source == 'Keyword'){
            $calendar->KeywordFilterID = urlencode($keyword);
		}elseif($this->Source == 'Search term'){
			$calendar->SearchTerm = urlencode($searchTerm);
		}

		return $calendar;
	}


}

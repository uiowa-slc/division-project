<?php

use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\Parsers\URLSegmentFilter;
class StaffTeam extends DataObject {

	private static $db = array(
		'Name' => 'Text',
		'SortOrder' => 'Int'
	);

	private static $many_many = array(
		'StaffPages' => 'StaffPage',
		'StaffHolderPages' => 'StaffHolderPage'
	);

	private static $summary_fields = array(
		'Name' => 'Name',
	);

	private static $default_sort = array(
		'SortOrder'
	);

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->addFieldToTab('Root.Main', new CheckboxSetField('StaffPages', 'People on this team', StaffPage::get()->map('ID', 'Title')));
		$f->removeByName('SortOrder');
		return $f;

	}

    public function URLSegment(){
        $filter = new URLSegmentFilter();
        $title = $this->Name;

        $segment = $filter->filter($title);
        return $segment;
    }

	public function SortedStaffPages(){
		$staffPages = $this->StaffPages()->sort('Sort');
		$this->extend('alterSortedStaffPages', $staffPages);
		return $staffPages;

	}

}

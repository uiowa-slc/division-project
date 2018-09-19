<?php

use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\ORM\DataObject;
class StaffTeam extends DataObject {

	private static $db = array(
		'Name' => 'Text',
		'SortOrder' => 'Int'
	);

	private static $many_many = array(
		'StaffPages' => 'StaffPage',
		'StaffHolderPages' => 'StaffHolderPage'
	);
	
	private static $belongs_many_many = array();
	
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

	public function SortedStaffPages(){
		$staffPages = $this->StaffPages()->sort('Sort');
		$this->extend('alterSortedStaffPages', $staffPages);
		return $staffPages;

	}

}

<?php

use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
class StaffTeam extends DataObject {

	private static $db = array(
		'Name' => 'Text',
		'SortOrder' => 'Int',
        'Description' => 'HTMLText'
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
        $f->addFieldToTab('Root.Main', new HTMLEditorField('Description'));
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

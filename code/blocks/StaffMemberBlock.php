<?php

use SilverStripe\Forms\DropdownField;

class StaffMemberBlock extends Block{

	private static $db = array(

	);

	private static $has_one = array(
		// 'StaffMemberTree' => 'SiteTree',
		'StaffPage' => 'StaffPage',

	);

	function getCMSFields() {
		$fields = parent::getCMSFields();

		// $fields->addFieldToTab('Root.Main', new TreeDropdownField("StaffMemberTreeID", "Select a Staff Member:", "SiteTree"));

		$fields->addFieldToTab('Root.Main', new DropdownField('StaffPageID', 'Select a Staff Member:', StaffPage::get()->sort('LastName ASC')->map('ID', 'Title')));

		return $fields;
	}

}
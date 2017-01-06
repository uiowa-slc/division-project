<?php

class StaffMemberBlock extends Block{

	private static $db = array(

	);

	private static $has_one = array(
		'StaffMemberTree' => 'SiteTree',

	);

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', new TreeDropdownField("StaffMemberTreeID", "Select a Staff Member:", "SiteTree"));

		return $fields;
	}

}
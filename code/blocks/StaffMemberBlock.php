<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;

class StaffMemberBlock extends BaseElement {

	private static $db = array(

	);

	private static $has_one = array(
		// 'StaffMemberTree' => 'SiteTree',
		'StaffPage' => 'StaffPage',

	);
	private static $table_name = 'StaffMemberBlock';

	public function getType() {
		return 'Staff Member Block';
	}

	function getCMSFields() {
		$this->beforeUpdateCMSFields(function (FieldList $fields) {

			// $fields->addFieldToTab('Root.Main', new TreeDropdownField("StaffMemberTreeID", "Select a Staff Member:", "SiteTree"));

			$fields->addFieldToTab('Root.Main', new DropdownField('StaffPageID', 'Select a Staff Member:', StaffPage::get()->sort('LastName ASC')->map('ID', 'Title')));

		});

		return parent::getCMSFields();
	}

}

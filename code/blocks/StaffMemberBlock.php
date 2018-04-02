<?php
namespace DNADesign\Elemental\Models;

use SilverStripe\Forms\DropdownField;
use DNADesign\Elemental\Models\BaseElement;

class StaffMemberBlock extends BaseElement{

	private static $db = array(

	);

	private static $has_one = array(
		// 'StaffMemberTree' => 'SiteTree',
		'StaffPage' => 'StaffPage',

	);
	private static $table_name = 'StaffMemberBlock';

	public function getType()
    {
        return 'Staff Member Block';
    }

	function getCMSFields() {
		$fields = parent::getCMSFields();

		// $fields->addFieldToTab('Root.Main', new TreeDropdownField("StaffMemberTreeID", "Select a Staff Member:", "SiteTree"));

		$fields->addFieldToTab('Root.Main', new DropdownField('StaffPageID', 'Select a Staff Member:', StaffPage::get()->sort('LastName ASC')->map('ID', 'Title')));

		return $fields;
	}

}
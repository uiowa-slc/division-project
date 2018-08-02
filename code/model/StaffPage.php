<?php

use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use MD\DivisionProject\StaffPageController;
class StaffPage extends Page {

	private static $db = array(
		"FirstName"      => "Text",
		"LastName"       => "Text",
		"Position"       => "Text",
		"EmailAddress"   => "Text",
		"Phone"          => "Text",
		"DepartmentURL"  => "Text",
		"DepartmentName" => "Text",
		"OtherWebsiteLink" => "Varchar(155)",
		"OtherWebsiteLabel" => "Varchar(155)"

	);

	private static $has_one = array(
		"Photo" => Image::class,
	);
	
    private static $owns = array(
        'Photo'
    );
	private static $defaults = array(
		"OtherWebsiteLabel" => "Website"
	);

	private static $belongs_many_many = array(
		"Teams" => "StaffTeam",
	);

	public function getCMSFields() {
		SiteTree::disableCMSFieldsExtensions();
		$fields = parent::getCMSFields();
		SiteTree::enableCMSFieldsExtensions();

		$fields->removeByName("Content");

		$fields->addFieldToTab("Root.Main", new TextField("FirstName", "First Name"));
		$fields->addFieldToTab("Root.Main", new TextField("LastName", "Last Name"));
		$fields->addFieldToTab("Root.Main", new TextField("Position", "Position"));
		$fields->addFieldToTab("Root.Main", new TextField("EmailAddress", "Email address"));
		$fields->addFieldToTab("Root.Main", new TextField("Phone", "Phone (XXX-XXX-XXXX)"));
		$fields->addFieldToTab("Root.Main", new TextField("DepartmentName", "Department name (optional)"));
		$fields->addFieldToTab("Root.Main", new TextField("DepartmentURL", "Department or Website URL (optional)"));
		$fields->addFieldToTab("Root.Main", new TextField("OtherWebsiteLink", "Other website URL (include http:// or https://)"));
		$fields->addFieldToTab("Root.Main", new TextField("OtherWebsiteLabel", "Other website label (default: \"Website\""));


		$fields->addFieldToTab("Root.Main", new CheckboxSetField("Teams", 'Team <a href="admin/pages/edit/show/14" target="_blank">(Manage Teams)</a>', StaffTeam::get()->map('ID', 'Name')));

		//$fields->addFieldToTab("Root.Main", new LiteralField("TeamLabel", ''));

		$fields->addFieldToTab("Root.Main", new HTMLEditorField("Content", "Biography"));
		$fields->addFieldToTab("Root.Main", new UploadField("Photo", "Photo (4:3 preferred - resizes to 760 x 507)"));
		$fields->addFieldToTab("Root.Main", new HTMLEditorField("Content", "Biography"));

		$this->extend('updateCMSFields', $fields);
		$fields->removeByName("BackgroundImage");
		return $fields;

	}
	public function FullNameTruncated() {
		$lastName = $this->owner->LastName;
		$fullName = $this->owner->FirstName.' '.substr($lastName, 0, 1).'.';

		return $fullName;
	}
	//private static $allowed_children = array("");

}

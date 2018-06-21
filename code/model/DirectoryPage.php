<?php

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Blog\Model\BlogPost;
// use SilverStripe\Blog\Controllers\BlogPostController;
use MD\DivisionProject\DirectoryPageController;
class DirectoryPage extends BlogPost {

	private static $db = array(
		"OfficeName" => "Text",
		"OfficeLocation" => "Text",
		"PhoneNumber" => "Varchar",
		"EmailAddress" => "Text",
		"Website" => "Text",
		"AdditionalInfo" => "HTMLText",

	);

	private static $has_one = array(

	);

	private static $can_be_root = true;

	private static $has_many = array(
	);

	private static $singular_name = 'Directory Page';

	private static $plural_name = 'Directory Pages';
	/* This is a GLOBAL change that should happen on all CISL sites */

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->removeByName("Blocks");
		$fields->removeByName("Widgets");
		$fields->removeByName("CustomSummary");
		$fields->removeByName("Metadata");

		$fields->addFieldToTab( 'Root.Main', new TextField("OfficeName", "Office Name"));
		$fields->addFieldToTab( 'Root.Main', new TextField("OfficeLocation", "Office Location"));
		$fields->addFieldToTab( 'Root.Main', new TextField("PhoneNumber", "Phone Number"));
		$fields->addFieldToTab( 'Root.Main', new TextField("EmailAddress", "Email Address"));
		$fields->addFieldToTab( 'Root.Main', new TextField("Website", "Website"));
		$fields->addFieldToTab( 'Root.Main', new HTMLEditorField("AdditionalInfo", "Additional Info"));


		$fields->removeByName('Content');
	    $fields->removeByName('StoryBy');
	    $fields->removeByName('StoryByEmail');
		$fields->removeByName('StoryByTitle');
		$fields->removeByName('StoryByDept');
		$fields->removeByName('PhotosBy');
		$fields->removeByName('ExternalURL');
		$fields->removeByName('PhotosByEmail');
		$fields->removeByName('BackgroundImage');


		//$f->removeByName("Content");
		//$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		//$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));


		/*$gridField = new GridField("StaffTeam", "Staff Teams", StaffTeam::get(), GridFieldConfig_RecordEditor::create());
		$f->addFieldToTab("Root.Main", $gridField); // add the grid field to a tab in the CMS	*/
		return $fields;
	}
}
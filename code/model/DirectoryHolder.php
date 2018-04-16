<?php

use SilverStripe\Forms\CheckboxField;
use SilverStripe\Blog\Model\Blog;
// use SilverStripe\Blog\Controllers\BlogController;
use MD\DivisionProject\DirectoryHolderController;
class DirectoryHolder extends Blog {

	private static $db = array(
		"TableViewCheck" => "Boolean",
	);

	private static $has_one = array(

	);

	private static $has_many = array(
	);

	private static $singular_name = 'Directory Holder';

	private static $plural_name = 'Directory Holders';

	private static $allowed_children = array("DirectoryPage");

	public function getCMSFields(){
		$f = parent::getCMSFields();
		//$f->removeByName("Content");
		//$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		//$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

		$f->addFieldToTab('Root.Main', new CheckboxField('TableViewCheck','Use Table View'));

		/*$gridField = new GridField("StaffTeam", "Staff Teams", StaffTeam::get(), GridFieldConfig_RecordEditor::create());
		$f->addFieldToTab("Root.Main", $gridField); // add the grid field to a tab in the CMS	*/
		return $f;
	}
}
<?php

use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\Blog\Model\Blog;
// use SilverStripe\Blog\Controllers\BlogController;
use MD\DivisionProject\ReportsHolderController;
class ReportsHolder extends Blog {

	private static $db = array(
	);

	private static $has_one = array(

	);

	private static $has_many = array(
	);

	private static $singular_name = 'Report Holder';

	private static $plural_name = 'Report Holders';

	private static $allowed_children = array("ReportPage", BlogPost::class);

	public function getCMSFields() {
		$f = parent::getCMSFields();
		//$f->removeByName("Content");
		//$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		//$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

		/*$gridField = new GridField("StaffTeam", "Staff Teams", StaffTeam::get(), GridFieldConfig_RecordEditor::create());
		$f->addFieldToTab("Root.Main", $gridField); // add the grid field to a tab in the CMS	*/
		return $f;
	}
}

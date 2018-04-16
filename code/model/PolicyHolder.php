<?php

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\Parsers\ShortcodeParser;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Control\Director;
use MD\DivisionProject\PolicyHolderController;
class PolicyHolder extends Page {

	private static $db = array(
		"Policies"   => "HTMLText",
		"PolicyYear" => "Text",
	);

	private static $has_one = array(

	);

	private static $has_many = array(
	);

	private static $singular_name = 'Policy Holder';

	private static $plural_name = 'Policy Holders';

	private static $allowed_children = array("PolicyPage");
	public function Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = true, $delimiter = null){
		return parent::Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = true, $delimiter = null);
	}	
	public function getCMSFields() {
		$f = parent::getCMSFields();
		//$f->removeByName("Content");
		//$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		//$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

		/*$gridField = new GridField("StaffTeam", "Staff Teams", StaffTeam::get(), GridFieldConfig_RecordEditor::create());
		$f->addFieldToTab("Root.Main", $gridField); // add the grid field to a tab in the CMS	*/
		$f->addFieldToTab("Root.Main", new TextField("PolicyYear", "Archive Policy Year (Only fill out if these policies are archived)"), "Content");
		$f->addFieldToTab("Root.Main", new HTMLEditorField("Policies", "Policies"));
		return $f;
	}
}

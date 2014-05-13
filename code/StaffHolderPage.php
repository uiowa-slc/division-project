<?php
class StaffHolderPage extends Page {

	private static $db = array(
		
	);

	private static $has_one = array(
	
	);

	private static $belongs_many_many = array(
		"Teams" => "StaffTeam"
	);

	private static $allowed_children = array("StaffPage", "VirtualPage");
	
	public function getCMSFields(){
		$f = parent::getCMSFields();
		
		$f->addFieldToTab('Root.Main', new CheckboxSetField("Teams", 'Show the following staff teams on this page:', StaffTeam::get()->map('ID', 'Title')), 'Content');
		
		//$f->removeByName("Content");
		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
		
		
		$gridField = new GridField("StaffTeam", "Staff Teams", StaffTeam::get(), $gridFieldConfig);
		$f->addFieldToTab("Root.Main", $gridField, "Content"); // add the grid field to a tab in the CMS	
		return $f;
	}
	
	public function Children(){
		$staffPages = parent::Children()->sort('LastName');
		return $staffPages;
	}
	
	public function StaffTeams(){
		$teams = StaffTeam::get();
		return $teams;
	}
}
class StaffHolderPage_Controller extends Page_Controller {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();

	}

}
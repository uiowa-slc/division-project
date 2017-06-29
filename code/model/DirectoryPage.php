<?php
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

	private static $has_many = array(
	);

	static $singular_name = 'Directory Page';

	static $plural_name = 'Directory Pages';
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
class DirectoryPage_Controller extends BlogPost_Controller {

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

	public function index(){
		$holder = DirectoryHolder::get()->first();
		$this->redirect($holder->Link().'#'.$this->URLSegment);
	}

	public function init() {
		parent::init();

	}

}
<?php
class FeatureHolderPage extends Page {

	private static $db = array(
		
	);

	private static $has_one = array(


	);

	//public static $allowed_children = array ("BranchPersonPage");

	function getCMSFields() {
		$fields = parent::getCMSFields();

		//$fields->removeFieldFromTab('Root.Content.Main', 'Content');
		//$fields->addFieldToTab('Root.Main', new CheckboxField('HideTextTitle','Hide Text Title'), "Content");
		//$fields->addFieldToTab('Root.Content.Main', new HTMLEditorField('Content','Content'));

		return $fields;
	}

}class FeatureHolderPage_Controller extends Page_Controller {

	public static $allowed_actions = array(
	);

	public function init() {
		parent::init();
	}
}
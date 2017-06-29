<?php
class LandingPageSection extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(155)',
		'Content' => 'HTMLText',
		'SortOrder' => 'Int'

	);

	private static $has_one = array(
		'LandingPage' => 'LandingPage'
	);

	private static $default_sort = array(
		'SortOrder'
	);
	//public static $allowed_children = array ("BranchPersonPage");

	function getCMSFields() {
		$fields = parent::getCMSFields();

		//$fields->removeFieldFromTab('Root.Content.Main', 'Content');
		//$fields->addFieldToTab('Root.Main', new CheckboxField('HideTextTitle','Hide Text Title'), "Content");
		//$fields->addFieldToTab('Root.Content.Main', new HTMLEditorField('Content','Content'));

		return $fields;
	}

}

<?php
class LandingPage extends Page {

	private static $db = array(

	);
	private static $has_one = array(
		'HeaderImage' => 'Image'
	);
	private static $has_many = array(
		'Sections' => 'LandingPageSection'

	);


	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$sectionsConf = GridFieldConfig_RelationEditor::create(10);
		$sectionsConf->addComponent(new GridFieldSortableRows('SortOrder'));
		
		$fields->addFieldToTab('Root.Main', new UploadField('HeaderImageID', 'Header Image (1600 x 900)'));
		$fields->addFieldToTab('Root.Main', new GridField('Sections', 'Sections', $this->Sections(), $sectionsConf));

		return $fields;
	}

}
class LandingPage_Controller extends Page_Controller {

	public static $allowed_actions = array(
	);

	public function init() {
		parent::init();
	}
}
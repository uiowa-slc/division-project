<?php
class LandingPage extends Page {

	private static $db = array(
		"HeaderText"      => "Text",
	);
	private static $has_one = array(
		'HeaderImage' => 'Image',
		'HeaderLogo' => 'Image'
	);
	private static $has_many = array(
		'Sections' => 'LandingPageSection'

	);


	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName("BackgroundImage");
		$sectionsConf = GridFieldConfig_RelationEditor::create(10);
		$sectionsConf->addComponent(new GridFieldSortableRows('SortOrder'));

		$fields->addFieldToTab('Root.Main', new UploadField('HeaderImage', 'Header Image (1600 x 800)'));
		$fields->addFieldToTab('Root.Main', new UploadField('HeaderLogo', 'HeaderLogo'));
		$fields->addFieldToTab('Root.Main', new TextField("HeaderText", "Header Text"));
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
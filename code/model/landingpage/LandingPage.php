<?php
class LandingPage extends Page {

	private static $db = array(
		'HeaderText'      => 'Text',
		'ShowBreadcrumbs' => 'Boolean(1)'
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

		$fields->removeByName('BackgroundImage');
		$fields->removeByName('Content');
		$fields->addFieldToTab('Root.Main', HTMLEditorField::create('Content','Content')->setRows(3));
		$fields->addFieldToTab('Root.Main', CheckboxField::create('ShowBreadcrumbs', 'Show breadcrumbs under header image?'));
		$sectionsConf = GridFieldConfig_RelationEditor::create(10);
		$sectionsConf->addComponent(new GridFieldSortableRows('SortOrder'));
		$fields->addFieldToTab('Root.Main', UploadField::create('HeaderImage', 'Header Image (1600 x 800)'));
		$fields->addFieldToTab('Root.Main', UploadField::create('HeaderImage', 'Header Image (1600 x 800)'));
		$fields->addFieldToTab('Root.Main', UploadField::create('HeaderLogo', 'Header Logo'));
		$fields->addFieldToTab('Root.Main', TextareaField::create('HeaderText', 'Header Text'));
				$fields->addFieldToTab('Root.Main', GridField::create('Sections', 'Sections', $this->Sections(), $sectionsConf));

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
<?php
class LandingPage extends Page {

	private static $db = array(
		'HeaderText'      => 'Text',
		'ShowBreadcrumbs' => 'Boolean(1)',
		'FacebookLink' => 'Varchar(2083)',
		'TwitterLink' => 'Varchar(2083)',
		'InstagramLink' => 'Varchar(2083)',
		'HeaderImageAltText' => 'Text'
	);
	private static $has_one = array(
		'HeaderImage' => 'Image',
		'HeaderLogo' => 'Image',
		'SecondaryImage' => 'Image'
	);
	private static $has_many = array(
		'Sections' => 'LandingPageSection'
	);

	private static $allowed_children = array(
		'LandingSubpage'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('BackgroundImage');
		$fields->removeByName('Content');
		$fields->addFieldToTab('Root.Main', HTMLEditorField::create('Content','Main Content')->setRows(3));
		$fields->addFieldToTab('Root.Main', UploadField::create('SecondaryImage','Secondary Image (shows in main content area)'));
		$fields->addFieldToTab('Root.Main', CheckboxField::create('ShowBreadcrumbs', 'Show breadcrumbs under header image?'));
		$sectionsConf = GridFieldConfig_RelationEditor::create(10);
		$sectionsConf->addComponent(new GridFieldSortableRows('SortOrder'));
		$fields->addFieldToTab('Root.Main', UploadField::create('HeaderImage', 'Header Image (1600 x 800 if there\'s a header logo and header text)'));
		$fields->addFieldToTab('Root.Main', TextField::create('HeaderImageAltText','Header Image Alt Text (if there is text in the main image, but no logo + header text uploaded)'));
		$fields->addFieldToTab('Root.Main', UploadField::create('HeaderLogo', 'Header Logo (optional)'));
		$fields->addFieldToTab('Root.Main', TextareaField::create('HeaderText', 'Header Text (optional)'));
				$fields->addFieldToTab('Root.Main', GridField::create('Sections', 'Sections', $this->Sections(), $sectionsConf), 'Content');
		$fields->addFieldToTab('Root.Main', TextField::create('FacebookLink','Facebook page link'));
		$fields->addFieldToTab('Root.Main', TextField::create('TwitterLink','Twitter page link'));
		$fields->addFieldToTab('Root.Main', TextField::create('InstagramLink','Instagram page link'));

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
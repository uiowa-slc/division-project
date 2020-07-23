<?php

use SilverStripe\Assets\Image;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\GridField\GridField;
use MD\DivisionProject\LandingPageController;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
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
		'HeaderImage' => Image::class,
		'HeaderLogo' => Image::class,
		'SecondaryImage' => Image::class
	);
	private static $has_many = array(
		'Sections' => 'LandingPageSection'
	);

	private static $allowed_children = array(
		'LandingSubpage'
	);

	private static $layout_types = array(
		'MainImage' => 'Big image (logos/text all contained within image)',
		'BackgroundImage' => 'Background image (logo/title in plain text)'
	);

	private static $cascade_duplicates = [ 'Sections' ];
	
	private static $icon_class = 'font-icon-rocket';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('BackgroundImage');
		$fields->removeByName('Content');
		$fields->removeByName('Blocks');
		$fields->removeByName('Widgets');

$fields->addFieldToTab('Root.Main', UploadField::create('HeaderImage', 'Header Image (1600 x 800 if there\'s a header logo and header text)')->addExtraClass('stacked'));
		$fields->addFieldToTab('Root.Main', TextField::create('HeaderImageAltText','Header Image Alt Text (if there is text in the main image, but no logo + header text uploaded)')->addExtraClass('stacked'));


		$fields->addFieldToTab('Root.Main', $headerLogoField = UploadField::create('HeaderLogo', 'Header logo'));

		$headerLogoField->displayIf('LayoutType')->isEqualTo('BackgroundImage');

		$fields->addFieldToTab('Root.Main', $headerTextField = TextareaField::create('HeaderText', 'Header text under logo'));

		$headerTextField->displayIf('LayoutType')->isEqualTo('BackgroundImage');
				$fields->addFieldToTab('Root.Main', CheckboxField::create('ShowBreadcrumbs', 'Show breadcrumbs under header image?'));
		$fields->addFieldToTab('Root.Main', HTMLEditorField::create('Content','Main Content')->addExtraClass('stacked'));
		$fields->addFieldToTab('Root.Main', UploadField::create('SecondaryImage','Secondary Image (shows in main content area)'));



		$sectionsConf = GridFieldConfig_RelationEditor::create(10);
		$sectionsConf->addComponent($sortableLanding = new GridFieldSortableRows('SortOrder'));
        $sortableLanding->setUpdateVersionedStage('Live');


		$fields->addFieldToTab('Root.Main', $sectionsGridField = GridField::create('Sections', 'Sections', $this->Sections(), $sectionsConf), 'SecondaryImage');



		$fields->addFieldToTab('Root.Main', TextField::create('FacebookLink','Facebook page link'));
		$fields->addFieldToTab('Root.Main', TextField::create('TwitterLink','Twitter page link'));
		$fields->addFieldToTab('Root.Main', TextField::create('InstagramLink','Instagram page link'));

		return $fields;
	}

}

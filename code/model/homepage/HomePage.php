<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\TextField;
use SilverStripe\Security\Permission;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class HomePage extends Page {

	private static $db = array(
		'ShuffleHomePageFeatures' => 'Boolean',
		'Background' => 'Enum(array("image","video")',
		'SubHeading' => 'HTMLText',
		'ButtonTextOne' => 'Text',
		'ButtonUrlOne' => 'Text',
		'ButtonTextTwo' => 'Text',
		'ButtonUrlTwo' => 'Text',
		'ButtonTextThree' => 'Text',
		'ButtonUrlThree' => 'Text',
		'Size' => 'Varchar(255)',
		'Position' => 'Varchar(255)',
		'TestOne' => 'Text',
		'TestTwo' => 'Text',
	);

	private static $has_one = array(
		'HeroImage' => Image::class,
		'HeroVideo' => File::class,
	);

	private static $has_many = array(
		'BackgroundFeatures' => 'HomePageBackgroundFeature',
	);

	private static $owns = array(
		'HeroImage',
		'HeroVideo',
	);

	private static $icon_class = 'font-icon-p-home';

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName('InheritSidebarItems');
		$f->removeByName('SidebarLabel');
		$f->removeByName('SidebarItem');
		$f->removeByName('BackgroundImage');
		$f->removeByName('YoutubeBackgroundEmbed');

		$f->addFieldToTab(
			'Root.Main',
			DropdownField::create('Background', 'Background')
				->setSource(
					array(
						'image' => 'Image',
						'video' => 'Video',
					)
				)
		);
		$f->addFieldToTab('Root.Main', UploadField::create('HeroVideo', 'Video')->displayIf('Background')->isEqualTo('video')->end());

		$f->addFieldToTab('Root.Main', UploadField::create('HeroImage', 'Image')->displayIf('Background')->isEqualTo('image')->end());

		$f->addFieldToTab(
			'Root.Main',
			DropdownField::create('Size', 'Size')
				->setSource(
					array(
						'medium' => 'Medium',
						'small' => 'Small',
						'large' => 'Large',
					)
				)->setValue('medium')
		);

		$f->addFieldToTab(
			'Root.Main',
			DropdownField::create('Position', 'Content Position')
				->setSource(
					array(
						'center' => 'Centered',
						'bottomleft' => 'Bottom Left',
					)
				)->setValue('center')
		);

		$f->addFieldToTab('Root.Main', TextField::create('SubHeading', 'Text Over Image')->setAttribute('maxlength', '150')->setDescription('Maximum length: 150 characters'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonTextOne', 'Button Text'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonUrlOne', 'Button URL'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonTextTwo', 'Button Text'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonUrlTwo', 'Button URL'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonTextThree', 'Button Text'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonUrlThree', 'Button URL'));

		// Begin Default Slider fields
		$newgridFieldConfig = GridFieldConfig_RecordEditor::create();
		$newgridFieldConfig->addComponent($newSortable = new GridFieldSortableRows('SortOrder'));

		$newSortable->setUpdateVersionedStage('Live');

		$newgridFieldConfig->removeComponentsByType('GridFieldDeleteAction');
		$newgridFieldConfig->removeComponentsByType('GridFieldAddExistingAutocompleter');

		if (!Permission::check('ADMIN')) {
			$newgridFieldConfig->removeComponentsByType('GridFieldAddNewButton');

		}

		$newHomePageHeroFeatureGridField = GridField::create('NewHomePageHeroFeature', 'Homepage Features', NewHomePageHeroFeature::get(), $newgridFieldConfig);

		$f->addFieldToTab('Root.Main', $newHomePageHeroFeatureGridField);

		$f->removeByName('LayoutType');
		$f->removeByName('Content');
		$f->removeByName('Content');
		$f->removeByName('Metadata');
		$f->removeByName('MetaDescription');
		$f->removeByName('BackgroundImage');
		return $f;
	}

}

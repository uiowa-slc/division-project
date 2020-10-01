<?php

use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\TextField;
use SilverStripe\Security\Permission;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class HomePage extends Page {

	private static $db = array(
		'ShuffleHomePageFeatures' => 'Boolean',
		'SubHeading' => 'Text',
		'CenterText' => 'Boolean',
		'ButtonTextOne' => 'Text',
		'ButtonUrlOne' => 'Text',
		'ButtonTextTwo' => 'Text',
		'ButtonUrlTwo' => 'Text',
		'ButtonTextThree' => 'Text',
		'ButtonUrlThree' => 'Text',
	);

	private static $has_one = array(

	);

	private static $has_many = array(
		'BackgroundFeatures' => 'HomePageBackgroundFeature',
	);

	private static $icon_class = 'font-icon-p-home';

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName('InheritSidebarItems');
		$f->removeByName('SidebarLabel');
		$f->removeByName('SidebarItem');
		$f->removeByName('YoutubeBackgroundEmbed');
		$f->removeByName('Content');

		$f->addFieldToTab('Root.Main', TextField::create('SubHeading', 'Text Over Image')->setAttribute('maxlength', '100')->setDescription('Maximum length: 100 characters'));

		$f->addFieldToTab('Root.Main', new CheckboxField('CenterText', 'Center Text Over Image'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonTextOne', 'Button Title'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonUrlOne', 'Button URL'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonTextTwo', 'Button Title'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonUrlTwo', 'Button URL'));
		$f->addFieldToTab('Root.Main', new TextField('ButtonTextThree', 'Button Title'));
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

		$this->extend('updateCMSFields', $f);
		$f->removeByName('LayoutType');
		$f->removeByName('Content');
		return $f;
	}

}

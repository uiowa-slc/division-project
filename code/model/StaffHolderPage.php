<?php

use SilverStripe\CMS\Model\VirtualPage;
use SilverStripe\UserForms\Model\UserDefinedForm;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridField;
use MD\DivisionProject\StaffHolderPageController;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class StaffHolderPage extends Page {

	private static $db = array(
		'SortLastName' => 'Boolean',
		'HideLinksToStaffPages' => 'Boolean',
		'PhotoOrientation' => 'Enum(array("Landscape","Portrait"), "Landscape")'
	);

	private static $defaults = array(
		'PhotoOrientation' => 'Landscape'
	);

	private static $has_one = array(

	);

	private static $belongs_many_many = array(
		'Teams' => 'StaffTeam'
	);
	private static $layout_types = array(
		'MainImage' => 'Big Full Width Image',
		'BackgroundImage' => 'Background Image',
		'ImageSlider' => 'Image Slider',
		'BackgroundVideo' => 'Background Video',
		'StaffTable' => 'Staff Table View'
	);


	private static $allowed_children = array("StaffPage", VirtualPage::class, UserDefinedForm::class);

	private static $icon_class = 'font-icon-torsos-all';

	public function getCMSFields(){
		$f = parent::getCMSFields();

		// $f->addFieldToTab('Root.Settings', new CheckboxField('SortLastName','Sort Staff By Last Name'));
		// $f->addFieldToTab('Root.Settings', new CheckboxField('HideLinksToStaffPages','Hide links to individual staff pages?'));
		// $f->addFieldToTab('Root.Settings', DropdownField::create( 'PhotoOrientation', 'Photo orientation', singleton('StaffHolderPage')->dbObject('PhotoOrientation')->enumValues()));

		$f->addFieldToTab('Root.Main', new CheckboxSetField('Teams', 'Show the following staff teams on this page:', StaffTeam::get()->map('ID', 'Title')), 'Content');

		//$f->removeByName('Content');
		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));


		$gridField = new GridField('StaffTeam', 'Staff Teams', StaffTeam::get(), $gridFieldConfig);
		$f->addFieldToTab('Root.Main', $gridField, 'Content'); // add the grid field to a tab in the CMS

		return $f;
	}
	public function getSettingsFields(){
		$f = parent::getSettingsFields();

		$f->addFieldToTab('Root.Settings', new CheckboxField('SortLastName','Sort Staff By Last Name'));
		$f->addFieldToTab('Root.Settings', new CheckboxField('HideLinksToStaffPages','Hide links to individual staff pages?'));
		$f->addFieldToTab('Root.Settings', DropdownField::create( 'PhotoOrientation', 'Photo orientation', singleton('StaffHolderPage')->dbObject('PhotoOrientation')->enumValues()));

		return $f;
	}
	public function Children(){
		if($this->SortLastName){
			$staffPages = parent::Children()->sort('LastName');
		}else{
			$staffPages = parent::Children();
		}

		$this->extend('alterChildren', $staffPages);
		return $staffPages;
	}

	public function StaffTeams(){
		$teams = StaffTeam::get();
		return $teams;
	}
}

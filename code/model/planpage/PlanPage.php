<?php
use SilverStripe\ORM\DataObject;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\CheckboxField;
class PlanPage extends Page{

	private static $db = array(

		'HidePlanItemsFromToc' => 'Boolean',
		'HideToc' => 'Boolean'
	);

	private static $has_one = array(

	);

	private static $has_many = array(
		'PlanCategories' => 'PlanCategory'
	);

	private static $singular_name = 'Plan Page';

	private static $plural_name = 'Plan Pages';

	public function getSettingsFields(){
		$fields = parent::getSettingsFields();
		$fields->addFieldToTab('Root.Settings', new CheckboxField('HidePlanItemsFromToc', 'Hide individual plan items from table of contents'));

		$fields->addFieldToTab('Root.Settings', new CheckboxField('HideToc', 'Hide table of contents entirely'));
		return $fields;
	}
	public function getCMSFields(){
		$fields = parent::getCMSFields();



		$config = GridFieldConfig_RelationEditor::create();
		$config->addComponent(new GridFieldSortableRows('SortOrder'));
		
		$planCatField = new GridField('PlanCategories', 'Plan categories', $this->PlanCategories());
		$planCatField->setConfig($config);

		$fields->addFieldToTab('Root.Main', $planCatField, 'Content');
		return $fields;
	}
}

<?php
use SilverStripe\ORM\DataObject;
class PlanPage extends Page{

	private static $db = array(


	);

	private static $has_one = array(

	);

	private static $has_many = array(
		'PlanCategories' => 'PlanCategory'
	);

	private static $singular_name = 'Plan Page';

	private static $plural_name = 'Plan Pages';


	public function getCMSFields(){
		$fields = parent::getCMSFields();

		$config = GridFieldConfig_RelationEditor::create();
		$planCatField = new GridField('PlanCategories', 'Plan catgories', $this->PlanCategories());
		$planCatField->setConfig($config);

		$fields->addFieldToTab('Root.Main', $planCatField, 'Content');
		return $fields;
	}
}

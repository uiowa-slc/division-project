<?php
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
		$config->addComponent(new GridFieldSortableRows('SortOrder'));
		
		$planCatField = new GridField('PlanCategories', 'Plan categories', $this->PlanCategories());
		$planCatField->setConfig($config);

		$fields->addFieldToTab('Root.Main', $planCatField, 'Content');
		return $fields;
	}
}
class PlanPage_Controller extends Page_Controller {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();

	}

}
<?php
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridField;

class PlanCategory extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(155)',
		'Content' => 'HTMLText',
		'Column1Heading' => 'Varchar(155)',
		'Column1Content' => 'HTMLText',
		'Column2Heading' => 'Varchar(155)',
		'Column2Content' => 'HTMLText',
	    'Column3Heading' => 'Varchar(155)',
	    'Column3Content' => 'HTMLText',
	    'SortOrder' => 'Int',
	);

	private static $has_one = array(
		'PlanPage' => 'PlanPage'
	);

	private static $has_many = array(
		'PlanItems' => 'PlanItem'
	);

	private static $summary_fields = array(
		'Title'
	);

	private static $defaults = array(

		'Column1Heading' => 'Priority',
		'Column2Heading' => 'Key Partner(s)',
		'Column2Content' => '',
		'Column3Heading' => '',
	);

	private static $default_sort = 'SortOrder';

	public function getCMSFields(){
		$fields = FieldList::create();

		$fields->push(TextField::create('Title', 'Title'));

		$fields->push(HTMLEditorField::create('Content', 'Intro')->setRows(4)->addExtraClass('stacked'));

		// $fields->push(new TextField('Column1Heading'));

		// $fields->push($column1Content = new HTMLEditorField('Column1Content'));
		// $column1Content->setRows(4);

		// $fields->push(new TextField('Column2Heading'));
		// $fields->push($column2Content = new HTMLEditorField('Column2Content'));	
		// $column2Content->setRows(4);

		$config = GridFieldConfig_RelationEditor::create();
		$config->addComponent(new GridFieldSortableRows('SortOrder'));
		$planItemsField = new GridField('PlanItems', 'Plan items', $this->PlanItems());
		$planItemsField->setConfig($config);
		
		$fields->push($planItemsField);

		return $fields;

	}

	protected function onBeforeWrite(){


		parent::onBeforeWrite();
	}

}

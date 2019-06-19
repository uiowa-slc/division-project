<?php
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridField;
class PlanItem extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(155)',
		'Column1Heading' => 'Varchar(155)',
		'Column1Content' => 'HTMLText',
		'Column2Heading' => 'Varchar(155)',
		'Column2Content' => 'HTMLText',
		'Column3Heading' => 'Varchar(155)',
		'Column3Content' => 'HTMLText',
		'SortOrder' => 'Int'

	);

	private static $has_one = array(
		'PlanCategory' => 'PlanCategory'
	);

	private static $summary_fields = array(
		'Title',
		'Column1Heading',
		'Column2Heading',
		'Column3Heading'
	);

	private static $defaults = array(
		'Column1Heading' => 'Recommendation',
		'Column2Heading' => 'Updates',
		'Column2Content' => '<ul><li>No updates at this time.</li></ul>',
		'Column3Heading' => '',
	);

	private static $default_sort = 'SortOrder';
	
	public function getCMSFields(){
		$fields = FieldList::create();


		$fields->push(new TextField('Title'));
		$fields->push(new TextField('Column1Heading'));
		$fields->push(HTMLEditorField::create('Column1Content')->addExtraClass('stacked'));
		$fields->push(new TextField('Column2Heading'));
		$fields->push(HTMLEditorField::create('Column2Content')->addExtraClass('stacked'));
		$fields->push(new TextField('Column3Heading'));
		$fields->push(HTMLEditorField::create('Column3Content')->addExtraClass('stacked'));		

		return $fields;

	}

	protected function onBeforeWrite(){
		// $link = $this->URL;

		// if($link != ''){
		// 	 if( $ret = parse_url($link)) {
		// 	  if(!isset($ret["scheme"])){
		// 	   	$parsedLink = "http://{$link}";
		// 	   	$this->URL = $parsedLink;
		// 	   }
		// 	}
		// }

		parent::onBeforeWrite();
	}

}

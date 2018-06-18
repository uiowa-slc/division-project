<?php
use SilverStripe\ORM\DataObject;
class PlanItem extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(155)',
		'Column1Heading' => 'Varchar(155)',
		'Column1Content' => 'HTMLText',
		'Column2Heading' => 'Varchar(155)',
		'Column2Content' => 'HTMLText'

	);

	private static $has_one = array(
		'PlanCategory' => 'PlanCategory'
	);

	private static $summary_fields = array(
		'Title',
		'Column1Heading',
		'Column2Heading'
	);

	private static $defaults = array(
		'Column1Heading' => 'Recommendation',
		'Column2Heading' => 'Updates',
		'Column2Content' => '<ul><li>No updates at this time.</li></ul>'
	);

	public function getCMSFields(){
		$fields = FieldList::create();


		$fields->push(new TextField('Title'));
		$fields->push(new TextField('Column1Heading'));
		$fields->push(new HTMLEditorField('Column1Content'));
		$fields->push(new TextField('Column2Heading'));
		$fields->push(new HTMLEditorField('Column2Content'));		

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

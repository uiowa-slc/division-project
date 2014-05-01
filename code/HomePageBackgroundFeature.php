<?php 

class HomePageBackgroundFeature extends DataObject {
	
	private static $db = array(
		'Tagline' => 'Text',
		'Buttons' => 'HTMLText'
		);
	
	private static $has_one = array (
		'Image' => 'Image',
		'HomePage' => 'HomePage'
		);

	private static $plural_name = "Background Features";
	
	private static $summary_fields = array (
		"Tagline",
		"Thumbnail"
	);

	function getThumbnail() {
		return $this->Image()->CMSThumbnail();
	}	

	public function getCMSFields() {
    	$fields = parent::getCMSFields();
		$fields->renameField("Buttons", "Buttons (Unordered List with Links)");
		//$fields->fieldByName("Buttons")->setRows(3);
		return $fields; 
	}
	
}
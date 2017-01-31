<?php
class SlideshowBlockImage extends DataObject {
    private static $db = array(
    	'Caption' => 'Text',
    	'SortOrder' => 'Int'
    );
    private static $has_one = array(
    	'Image' => 'Image',
    	'SlideshowBlock' => 'SlideshowBlock'
    );

    private static $summary_fields = array (
    	'Image.CMSThumbnail',
    	'Caption'
    );
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('SortOrder');
		$fields->removeByName('SlideshowBlock');


		return $fields;
	}

}
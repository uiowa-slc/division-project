<?php
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

class SlideshowBlockImage extends DataObject {
	private static $db = array(
		'Caption' => 'Text',
		'SortOrder' => 'Int',
	);
	private static $has_one = array(
		'Image' => Image::class,
		'SlideshowBlock' => 'SlideshowBlock',
	);

	private static $summary_fields = array(
		'Image.CMSThumbnail',
		'Caption',
	);

	private static $owns = [
		'Image',
	];

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('SortOrder');
		$fields->removeByName('SlideshowBlock');

		return $fields;
	}

}

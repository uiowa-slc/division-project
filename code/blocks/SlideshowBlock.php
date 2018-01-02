<?php
namespace SheaDawson\Blocks\Model;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Assets\Image;
use Colymba\BulkUpload\BulkUploader;
use SilverStripe\Forms\GridField\GridField;

class SlideshowBlock extends Block{

	private static $db = array(
		'UseExif' => 'Boolean'
	);

	private static $has_one = array(


	);
	private static $has_many = array(
		'SlideshowBlockImages' => 'SlideshowBlockImage'
	);
	public function getCMSFields() {
		$fields = new FieldList();

		$gridFieldConfig = GridFieldConfig_RelationEditor::create();

		$row = 'SortOrder';
		$gridFieldConfig->addComponent($sort = new GridFieldSortableRows(stripslashes($row)));
		$gridFieldConfig->addComponent(new BulkUploader(Image::class, 'SlideshowBlockImage'));

		$gridField = new GridField('SlideshowBlockImages', 'SlideshowImages', $this->SlideshowBlockImages(), $gridFieldConfig);
		$fields->push($gridField);


		return $fields;
	}

}
<?php

use DNADesign\Elemental\Models\BaseElement;

class SlideshowBlock extends BaseElement {

	private static $db = array(
		'UseExif' => 'Boolean',
	);

	private static $has_one = array(

	);
	private static $has_many = array(
		'SlideshowBlockImages' => 'SlideshowBlockImage',
	);
	private static $table_name = 'SlideshowBlock';

	public function getType() {
		return 'Slideshow Block';
	}

	public function getCMSFields() {
		// $fields = new FieldList();

		// $gridFieldConfig = GridFieldConfig_RelationEditor::create();

		// $row = 'SortOrder';
		// $gridFieldConfig->addComponent($sort = new GridFieldSortableRows(stripslashes($row)));

		// //BulkUploader is kinda glitchy right now.
		// // $gridFieldConfig->addComponent(new BulkUploader(Image::class, 'SlideshowBlockImage'));

		// $gridField = new GridField('SlideshowBlockImages', 'SlideshowImages', $this->SlideshowBlockImages(), $gridFieldConfig);
		// $fields->push($gridField);

		// return $fields;
	}

}

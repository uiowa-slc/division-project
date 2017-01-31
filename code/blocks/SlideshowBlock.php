<?php

class SlideshowBlock extends Block{

	private static $db = array(

	);

	private static $has_one = array(


	);
	private static $has_many = array(
		'SlideshowBlockImages' => 'SlideshowBlockImage'
	);
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$gridFieldConfig = GridFieldConfig_RelationEditor::create();

		$row = 'SortOrder';
		$gridFieldConfig->addComponent($sort = new GridFieldSortableRows(stripslashes($row)));

		$gridField = new GridField('SlideshowBlockImages', 'SlideshowImages', $this->SlideshowBlockImages(), $gridFieldConfig);
		$fields->addFieldToTab("Root.Main", $gridField);


		return $fields;
	}

}
<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Assets\Image;
use Colymba\BulkUpload\BulkUploader;
use SilverStripe\Forms\GridField\GridField;
use DNADesign\Elemental\Models\BaseElement;
use UncleCheese\DisplayLogic\Wrapper;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class SlideshowBlock extends BaseElement{

	private static $db = array(
		'UseExif' => 'Boolean'
	);

	private static $has_one = array(


	);
	private static $has_many = array(
		'SlideshowBlockImages' => 'SlideshowBlockImage'
	);
	private static $table_name = 'SlideshowBlock';

	public function getType()
    {
        return 'Slideshow Block';
    }
    /**
     * Set to false to prevent an in-line edit form from showing in an elemental area. Instead the element will be
     * clickable and a GridFieldDetailForm will be used.
     *
     * @config
     * @var bool
     */
    private static $inline_editable = false;
    /**
     * @return array
     */
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();

        return $blockSchema;
    }

	// public function getCMSFields() {
	// 	$fields = parent::getCMSFields();

	// 	$gridFieldConfig = GridFieldConfig_RelationEditor::create();

	// 	$row = 'SortOrder';
	// 	$gridFieldConfig->addComponent($sort = new GridFieldSortableRows(stripslashes($row)));

	// 	//BulkUploader is kinda glitchy right now.
	// 	// $gridFieldConfig->addComponent(new BulkUploader(Image::class, 'SlideshowBlockImage'));

	// 	$gridField = new GridField('SlideshowBlockImages', 'SlideshowImages', $this->SlideshowBlockImages(), $gridFieldConfig);
	// 	$fields->push($gridField);


	// 	return $fields;
	// }

}
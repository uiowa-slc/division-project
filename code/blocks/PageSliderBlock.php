<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\TreeMultiselectField;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\OptionsetField;
use UncleCheese\DisplayLogic\Forms\Wrapper;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordViewer;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\FieldList;
class PageSliderBlock extends BaseElement{

	private static $db = array(


	);
	private static $has_one = array(
		'Holder' => SiteTree::class,
	);

	private static $many_many = array(
		'Links' => 'PageSliderBlockLink'
	);
	private static $many_many_extraFields = [
		'Links' => [
			'SortOrder' => 'Int'
		]
	];


    public function getType(){
        return 'Page Slider Block';
    }

	public function getCMSFields() {

        $this->beforeUpdateCMSFields(function (FieldList $fields) {

		$fields->removeByName('HolderID');

		$fields->push(HTMLEditorField::create('Content', 'Summary')->setRows(3));
		if(!$this->ID){
			$gridFieldConfig = GridFieldConfig_RecordViewer::create();
			$fields->push(LiteralField::create('MustSaveLabel', '<em>Please click the <strong>"Create"</strong> button to save this block before adding some links.</em>')->addExtraClass('stacked'));

		}else{
			$gridFieldConfig = GridFieldConfig_RelationEditor::create();
			$row = 'SortOrder';
			$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));


			$gridField = new GridField('Links', 'Links', $this->Links(), $gridFieldConfig);
			$fields->push($gridField);

		}

    });

        return parent::getCMSFields();

	}

	public function Links()
	{
		return $this->getManyManyComponents('Links')->sort('SortOrder');
	}


}

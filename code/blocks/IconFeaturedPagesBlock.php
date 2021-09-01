<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use UncleCheese\DisplayLogic\Forms\Wrapper;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordViewer;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\Forms\LiteralField;
class IconFeaturedPagesBlock extends BaseElement {

     private static $db = array(

     );

    private static $many_many = array(
        'Links' => 'IconFeaturedPagesBlockLink',
    );
    private static $many_many_extraFields = [
        'Links' => [
            'SortOrder' => 'Int',
        ],
    ];

     private static $table_name = 'IconFeaturedPagesBlock';


     public function getType() {
          return 'Icon Featured Pages Block';
     }

     public function getCMSFields() {
          $this->beforeUpdateCMSFields(function (FieldList $fields) {

            $fields->push(HTMLEditorField::create('Content', 'Summary')->setRows(3));
            if (!$this->ID) {
                $gridFieldConfig = GridFieldConfig_RecordViewer::create();
                $fields->push(LiteralField::create('MustSaveLabel', 'Please click the "Create" button to save this block before adding links.')->addExtraClass('stacked'));

            } else {
                $gridFieldConfig = GridFieldConfig_RelationEditor::create();
                $row = 'SortOrder';
                $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

                $gridField = new GridField('Links', 'Links', $this->Links(), $gridFieldConfig);
                $fields->push($gridField);

            }

          });

          return parent::getCMSFields();
     }

}

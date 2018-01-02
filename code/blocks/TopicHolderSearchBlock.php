<?php

use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\Form;
use MD\DivisionProject\TopicHolderSearchBlockController;

class TopicHolderSearchBlock extends Block {

	private static $db = array(

    );

    private static $has_one = array(
        'TopicHolder' => 'TopicHolder',
        'BackgroundImage' => Image::class

    );
    private static $many_many = array(

    );

    public function getCMSFields(){
        $fields = parent::getCMSFields();
        $field = DropdownField::create('TopicHolderID', 'Select a Topic Holder:', TopicHolder::get()->map('ID', 'Title'));
        $fields->addFieldToTab('Root.Main', $field);
        $fields->addFieldToTab("Root.Main", new UploadField("BackgroundImage", "Background Image"));

        return $fields;
    }

    public function TopicSearchForm(){
        return $this->getController()->TopicSearchForm();
    }

    
}


   
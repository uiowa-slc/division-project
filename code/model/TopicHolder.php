<?php

use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Blog\Model\BlogTag;
use SilverStripe\Blog\Model\BlogCategory;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\Blog\Model\Blog;
use MD\DivisionProject\TopicHolderController;

class TopicHolder extends Blog {

	private static $db = array(
        'ShowCategoriesTab' => 'Boolean(1)',
        'ShowTagsTab' => 'Boolean(1)',
        'ShowLastUpdated' => 'Boolean(1)',

        'Heading' => 'Text',
        'NoTopicsText' => 'Text',

        'CategoryTabTitle' => 'Varchar(155)',
        'CategoryTabHeading' => 'Varchar(155)',
        
        'TagTabTitle' => 'Varchar(155)',
        'TagTabHeading' => 'Varchar(155)',

        'AllTopicsTabTitle' => 'Varchar(155)',
        'AllTopicsTabHeading' => 'Varchar(155)'
	);

	private static $allowed_children = array('Topic');

    private static $icon_class = 'font-icon-book';

    public function getLumberjackTitle() {
        return 'Topics';
    }


	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$questionGridFieldConfig = GridFieldConfig_RecordEditor::create();
		$questionGridField = new GridField('TopicQuestions', 'Questions', TopicQuestion::get());
		$questionGridField->setConfig($questionGridFieldConfig);

        $fields->addFieldToTab('Root.Terminology', TextField::create('Heading', 'Heading above search box (default: Search for a topic below'));
        $fields->addFieldToTab('Root.Terminology', TextField::create('NoTopicsText', 'Text to display if there aren\'t any topics. (default: No topics currently listed.'));

        $fields->addFieldToTab('Root.Terminology', TextField::create('CategoryTabTitle', 'Category tab title (default: Categories'));
        $fields->addFieldToTab('Root.Terminology', TextField::create('CategoryTabHeading', 'Category tab heading (default: Topics by category:'));

        $fields->addFieldToTab('Root.Terminology', TextField::create('TagTabTitle', 'Tag tab title (default: Tags'));
        $fields->addFieldToTab('Root.Terminology', TextField::create('TagTabHeading', 'Tag tab heading (default: Topics by tag:'));

        $fields->addFieldToTab('Root.Terminology', TextField::create('AllTopicsTabTitle', 'All topics tab title (default: All topics by title'));
        $fields->addFieldToTab('Root.Terminology', TextField::create('AllTopicsTabHeading', 'All topics tab heading (default: All topics by title'));

        //All topics by title:

		$fields->addFieldToTab('Root.Questions', $questionGridField);

		return $fields;
	}
    public function getSettingsFields(){
        $fields = parent::getSettingsFields();
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('ShowLastUpdated', 'Show "Last updated" text on each topic'));
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('ShowCategoriesTab', 'Show "Category" tab in "All Topics" navigator'));
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('ShowTagsTab', 'Show "Tag" tab in "All Topics" navigator'));
        return $fields;

    }
    public function AllTags()
    {
        //$blog = $this;
        $tags = BlogTag::get()->filter(array('BlogID' => $this->ID));

        return $tags;
    }

    public function AllCats()
    {
        //$blog = $this;
        $cats = BlogCategory::get()->filter(array('BlogID' => $this->ID));

        return $cats;
    }

    public function TopicsByLetter(){
    	$alphas = range('A', 'Z');
    	$letterArrayList = new ArrayList();

    	//print_r($topics->toArray());
    	foreach($alphas as $letter){
    		$letterTopics = Topic::get()->filter(array('Title:StartsWith' => $letter, 'ParentID' => $this->ID));

    		if($letterTopics->Count() > 0){
        		$letterArrayData = new ArrayData(array('Letter' => $letter, 'Topics' => $letterTopics));
    			$letterArrayList->push($letterArrayData);			
    		}
    		 
    	}

    	//print_r($letterArrayList->toArray());
    	return $letterArrayList;
    }
}
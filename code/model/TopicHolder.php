<?php
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
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
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
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
        'AllTopicsTabHeading' => 'Varchar(155)',

        'TermPlural' => 'Varchar(155)'
	);


    private static $has_many = array(
        'FeaturedTopics' => 'Topic'
    );

	private static $allowed_children = array('Topic');

    private static $icon_class = 'font-icon-book';

    public function getLumberjackTitle() {
        return 'Topics';
    }


	public function getCMSFields(){
		$fields = parent::getCMSFields();

		// $questionGridFieldConfig = GridFieldConfig_RecordEditor::create();
		// $questionGridField = new GridField('TopicQuestions', 'Questions', TopicQuestion::get());
		// $questionGridField->setConfig($questionGridFieldConfig);

  //       $fields->addFieldToTab('Root.Terminology', TextField::create('Heading', 'Heading above search box (default: Search for a topic below'));
  //       $fields->addFieldToTab('Root.Terminology', TextField::create('NoTopicsText', 'Text to display if there aren\'t any topics. (default: No topics currently listed.'));

        //All topics by title:

		// $fields->addFieldToTab('Root.Questions', $questionGridField);

        $featuredGridFieldConfig = GridFieldConfig_RelationEditor::create();
        $featuredGridFieldConfig->removeComponentsByType(GridFieldAddNewButton::class);
        $featuredGridFieldConfig->addComponent(new GridFieldSortableRows('FeaturedSortOrder'));
        
        $featuredGridField = new GridField('FeaturedTopics', 'Featured Topics', $this->FeaturedTopics());
        $featuredGridField->setConfig($featuredGridFieldConfig);
        $fields->addFieldToTab('Root.Main', $featuredGridField, 'Content');


		return $fields;
	}
    public function getSettingsFields(){
        $fields = parent::getSettingsFields();

        $fields->addFieldToTab('Root.Settings', TextField::create('TermPlural', 'Plural term for topics (ex: "Resources," "Entries," defaults to empty):')->addExtraClass('stacked'));
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('ShowLastUpdated', 'Show "Last updated" text on each topic'));
        // $fields->addFieldToTab('Root.Settings', CheckboxField::create('ShowCategoriesTab', 'Show "Category" tab in "All Topics" navigator'));
        // $fields->addFieldToTab('Root.Settings', CheckboxField::create('ShowTagsTab', 'Show "Tag" tab in "All Topics" navigator'));
        return $fields;

    }

    public function getBreadcrumbs(){
        $breadcrumbs = parent::getBreadCrumbs();
        print_r($breadcrumbs);
        return $breadcrumbs;
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
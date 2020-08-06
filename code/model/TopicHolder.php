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
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Control\Controller;
class TopicHolder extends Blog {

	private static $db = array(
        'ShowCategoriesTab' => 'Boolean(1)',
        'ShowTagsTab' => 'Boolean(1)',
        'ShowLastUpdated' => 'Boolean(1)',
        'ShowFullTopicBody' => 'Boolean',

        'Heading' => 'Text',
        'NoTopicsText' => 'Text',

        'CategoryTabTitle' => 'Varchar(155)',
        'CategoryTabHeading' => 'Varchar(155)',

        'TagTabTitle' => 'Varchar(155)',
        'TagTabHeading' => 'Varchar(155)',

        'AllTopicsTabTitle' => 'Varchar(155)',
        'AllTopicsTabHeading' => 'Varchar(155)',

        'TermPlural' => 'Varchar(155)',

        'FeedbackText' => 'HTMLText',
        'FeedbackLink' => 'Text',

        'DisableTags' => 'Boolean',
        'DisableTagsBrowse' => 'Boolean',

        'DisableCategories' => 'Boolean',
        'DisableCategoriesBrowse' => 'Boolean'

	);


    private static $has_many = array(
        'FeaturedTopics' => 'Topic'
    );

	private static $allowed_children = array('Topic');

    private static $icon_class = 'font-icon-book';

    public function getLumberjackTitle() {
        return 'Topics';
    }

    //Allow for blog to be homepage. Experimental.
    // public function Link($action = NULL){
    //     if($action){
    //         if(($this->ParentID == 0) && ($this->URLSegment == 'home')){
    //             return 'home';
    //         }
    //     }
    //     //$link = parent::getLink();

    // }

	public function getCMSFields(){
		$fields = parent::getCMSFields();

        $fields->removeByName('Dependent');
        $fields->removeByName('Blocks');
        $fields->removeByName('Widgets');
        $fields->removeByName('LayoutType');
        $fields->removeByName('MetaData');

        $catTab = $fields->findTab('Root.Categorisation');
        $catTab->setTitle('Categories');
        // Question/answer functionality is disabled for now.
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

        $fields->addFieldToTab('Root.Feedback', TextField::create('FeedbackLink'));
        $fields->addFieldToTab('Root.Feedback', HtmlEditorField::create('FeedbackText'));



        //Featured topics are disabled for now.
        // $fields->addFieldToTab('Root.Main', $featuredGridField, 'Content');


		return $fields;
	}
    public function getSettingsFields(){
        $fields = parent::getSettingsFields();



        $fields->addFieldToTab('Root.Settings', TextField::create('TermPlural', 'Plural term for topics (ex: "Resources," "Entries," defaults to empty):')->addExtraClass('stacked'));
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('ShowLastUpdated', 'Show "Last updated" text on each topic'));
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('ShowFullTopicBody', 'Show full HTML body of the topics in their categories/tags'));
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('DisableTags', 'Disable Tags in the CMS'));
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('DisableTagsBrowse', 'Disable Tags in the "Browse by" section'));
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('DisableCategories', 'Disable Categories in the CMS'));
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('DisableCategoriesBrowse', 'Disable Categories in the "Browse by" section'));
        return $fields;

    }


    /**
     * Returns a list of breadcrumbs for the current page.
     *
     * @param int $maxDepth The maximum depth to traverse.
     * @param boolean|string $stopAtPageType ClassName of a page to stop the upwards traversal.
     * @param boolean $showHidden Include pages marked with the attribute ShowInMenus = 0
     *
     * @return ArrayList
    */
    public function getBreadcrumbItems($maxDepth = 20, $stopAtPageType = false, $showHidden = false)
    {
        $pages = parent::getBreadcrumbItems();

        $controllerParams = Controller::curr()->getURLParams();

        if($controllerParams['Action'] == 'category'){
            $categorySlugTest = $controllerParams['ID'];
            $category = BlogCategory::get()->filter(array('URLSegment' => $categorySlugTest))->First();

            if($category){
                $pages->push($category);
            }


        }elseif($controllerParams['Action'] == 'tag'){
            $tagSlugTest = $controllerParams['ID'];
            $tag = BlogTag::get()->filter(array('URLSegment' => $tagSlugTest))->First();
            if($tag){
                $pages->push($tag);
            }
        }

        return $pages;
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
    public function validate()
    {
        $result = parent::validate();

        if($this->DisableTags && $this->DisableCategories) {
            $result->addError("Can't disable both categories and tags, please enable one or the other.");
        }

        return $result;
    }
}

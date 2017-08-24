<?php

class TopicHolder extends Blog {

	private static $db = array(
        'ShowCategoriesTab' => 'Boolean(1)',
        'ShowTagsTab' => 'Boolean(1)',
        'ShowLastUpdated' => 'Boolean(1)'
	);

	private static $allowed_children = array('Topic');

    public function getLumberjackTitle() {
        return 'Topics';
    }

	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$questionGridFieldConfig = GridFieldConfig_RecordEditor::create();
		$questionGridField = new GridField('TopicQuestions', 'Questions', TopicQuestion::get());
		$questionGridField->setConfig($questionGridFieldConfig);

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


class TopicHolder_Controller extends Blog_Controller{
	private static $allowed_actions = array(
		'SearchForm'
	);

}
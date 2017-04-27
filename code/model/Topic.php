<?php

class Topic extends BlogPost {

	private static $many_many = array(
		'TopicQuestions' => 'TopicQuestion'
	);

	private static $belongs_many_many = array(
		'Locations' => 'LocationPage'
	);

    public function AllTags(){
        $tags = BlogTag::get()->filter(array('BlogID' => $this->ParentID))->sort('Title ASC');
        return $tags;
    }

	public function getCMSFields(){
		
		$fields = parent::getCMSFields();

		$qField = TagField::create(
						'TopicQuestions',
						'Questions relevant to this topic:',
						TopicQuestion::get(),
						$this->TopicQuestions()
					)->setShouldLazyLoad(true)->setCanCreate(false);

		$fields->addFieldToTab('Root.Main', $qField, 'Content');
		return $fields;

	}

}


class Topic_Controller extends BlogPost_Controller{



}
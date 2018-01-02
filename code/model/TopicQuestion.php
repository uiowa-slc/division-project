<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\TagField\TagField;
use SilverStripe\ORM\DataObject;

class TopicQuestion extends DataObject {

	private static $db = array(
		'Title' => 'Text',
	);

	private static $belongs_many_many = array(
		'Topics' => 'Topic'
	);

	private static $summary_fields = array(
		'Title'
	);

	public function getCMSFields(){
		$fields = FieldList::create();

		$fields->push(TextField::create('Title', 'Question'));

		$topicField = TagField::create(
						'Topics',
						'Relevant topics for this question:',
						Topic::get(),
						$this->Topics()
					)
	->setShouldLazyLoad(true) // tags should be lazy loaded
	->setCanCreate(false);     // new tag DataObjects can be created

		$fields->push($topicField);

		return $fields;

	}

}

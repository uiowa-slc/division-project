<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\TagField\TagField;
use SilverStripe\ORM\DataObject;

class PageSliderBlockLink extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(155)',
		'Content' => 'HTMLText',
		'ExternalLink' => ''
		'URL' => 'Varchar(155)'
	);

	private static $belongs_many_many = array(
		'PageSliderBlocks' => 'PageSliderBlock'
	);

	private static $has_one = array(
		'Page' => 'SiteTree'
	);


	public function getCMSFields(){
		$fields = FieldList::create();

		$fields->push(TextField::create('Title', 'Question'));

		$topicField = TagField::create(
						'Topics',
						'Relevant topics for this link:',
						Topic::get(),
						$this->Topics()
					)
					->setShouldLazyLoad(true) // tags should be lazy loaded
					->setCanCreate(false);     // new tag DataObjects can be created

		$fields->push($topicField);

		return $fields;

	}

	protected function onBeforeWrite(){
		$link = $this->URL;

		if($link != ''){
			 if( $ret = parse_url($link)) {
			  if(!isset($ret["scheme"])){
			   	$parsedLink = "http://{$link}";
			   	$this->URL = $parsedLink;
			   }
			}
		}

		parent::onBeforeWrite();
	}

}

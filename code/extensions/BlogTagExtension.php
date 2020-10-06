<?php

use SilverStripe\Assets\Image;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class BlogTagExtension extends DataExtension {

	private static $db = array(
		'ContentAfter' => 'HTMLText',

	);

	private static $has_one = array(
		'Image' => Image::class,
	);

	private static $summary_fields = array(
		'Image.CMSThumbnail', 'Title',
	);

	private static $singular_name = 'Tag';

	private static $plural_name = 'Tags';

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab('Root.Main', new HTMLEditorField('Content'));

		$listToBeSearched = BlogPost::get()->filter(array('ClassName' => 'Topic', 'ParentID' => $this->owner->BlogID));

		$postsGridFieldConfig = GridFieldConfig_RelationEditor::create();
		$postsGridFieldConfig->removeComponentsByType(GridFieldAddNewButton::class);

		//print_r($postsGridFieldConfig->getComponents());
		$postsGridFieldConfig->getComponentByType('SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter')->setSearchList($listToBeSearched);

		$postsGridField = new GridField('BlogPosts', 'Topics', $this->owner->BlogPosts());
		$postsGridField->setConfig($postsGridFieldConfig);

		$fields->addFieldToTab('Root.Posts', $postsGridField);

		$fields->push(TextField::create('URLSegment', 'URL Segment'));

		$fields->push(HTMLEditorField::create('ContentAfter', 'Content after the list of topics')->addExtraClass('stacked'));

	}
	//TODO: Move to a new BlogObjectExtension.
	public function TermPlural() {

		return $this->owner->Blog()->TermPlural;

	}
}

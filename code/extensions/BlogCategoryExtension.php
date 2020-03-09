<?php

use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Blog\Model\BlogPost;

	class BlogCategoryExtension extends DataExtension {
		private static $db = array(
			'Content' => 'HTMLText'

		);
		private static $has_one = array(
			'Image' => Image::class

		);
		private static $belongs_many_many = array(
			'RecentNewsBlocks' => 'RecentNewsBlock'
		);

		public function updateCMSFields(FieldList $fields){
			$fields->addFieldToTab('Root.Main', new HTMLEditorField('Content'));


			$listToBeSearched = BlogPost::get()->filter(array('ClassName' => 'Topic', 'ParentID' => $this->owner->BlogID));

	        $postsGridFieldConfig = GridFieldConfig_RelationEditor::create();
	        $postsGridFieldConfig->removeComponentsByType(GridFieldAddNewButton::class);

	        //print_r($postsGridFieldConfig->getComponents());
	        $postsGridFieldConfig->getComponentByType('SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter')->setSearchList($listToBeSearched);
	   
	        $postsGridField = new GridField('BlogPosts', 'Topics', $this->owner->BlogPosts());
	        $postsGridField->setConfig($postsGridFieldConfig);

	        $fields->addFieldToTab('Root.Posts', $postsGridField);
				//$fields->push(new UploadField(Image::class, 'Background Image'), 'Title');
		}


	}
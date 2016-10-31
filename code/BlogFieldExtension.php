<?php

class BlogFieldExtension extends DataExtension {

	private static $db = array(
		'StoryBy'       => 'Text',
		'StoryByEmail'  => 'Text',
		'StoryByTitle'  => 'Text',
		'StoryByDept'   => 'Text',
		'PhotosBy'      => 'Text',
		'PhotosByEmail' => 'Text',
		'ExternalURL'   => 'Text',
	);

	public function getCMSFields() {
		$this->extend('updateCMSFields', $fields);

		return $fields;
	}

	public function updateCMSFields(FieldList $fields) {


		$fields->removeByName("BackgroundImage");
		$fields->removeByName("FeaturedImage");
		$fields->removeByName("Authors");
		$fields->removeByName("AuthorNames");
		$fields->removeByName("CustomSummary");

		$fields->addFieldToTab("blog-admin-sidebar", new TextField('StoryBy', 'Story author'));
		$fields->addFieldToTab("blog-admin-sidebar", new TextField('StoryByEmail', 'Author email address'));
		$fields->addFieldToTab("blog-admin-sidebar", new TextField('StoryByTitle', 'Author posiiton title'));
		$fields->addFieldToTab("blog-admin-sidebar", new TextField('StoryByDept', 'Author department title'));
		$fields->addFieldToTab("blog-admin-sidebar", new TextField('PhotosBy', 'Photos or video by'));
		$fields->addFieldToTab("blog-admin-sidebar", new TextField('PhotosByEmail', 'Photographer email address'));
		$fields->addFieldToTab("Root.Main", new TextField('ExternalURL', 'External URL (if story lives elsewhere)'), 'Content');
		$fields->addFieldToTab("Root.Main", new UploadField('FeaturedImage', 'Main Image (shows up on FB Shares)'), 'Content');


		if ($this->owner->ClassName == "BlogEntry") {
			//$fields->removeByName("Date");
		} else {
			$fields->renameField("Date", "Published Date");
		}

	}

}
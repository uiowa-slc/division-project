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
		$fields->addFieldToTab("Root.AdditionalCredits", new TextField('StoryBy', 'Story author'));
		$fields->addFieldToTab("Root.AdditionalCredits", new TextField('StoryByEmail', 'Author email address'));
		$fields->addFieldToTab("Root.AdditionalCredits", new TextField('StoryByTitle', 'Author posiiton title'));
		$fields->addFieldToTab("Root.AdditionalCredits", new TextField('StoryByDept', 'Author department title'));
		$fields->addFieldToTab("Root.AdditionalCredits", new TextField('PhotosBy', 'Photos or video by'));
		$fields->addFieldToTab("Root.AdditionalCredits", new TextField('PhotosByEmail', 'Photographer email address'));
		$fields->addFieldToTab("Root.AdditionalCredits", new TextField('ExternalURL', 'External URL (if story lives elsewhere)'), 'Content');
		$fields->removeByName("BackgroundImage");

		if ($this->owner->ClassName == "BlogEntry") {
			//$fields->removeByName("Date");
		} else {
			$fields->renameField("Date", "Published Date");
		}

	}

}
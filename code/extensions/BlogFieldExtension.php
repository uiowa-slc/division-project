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
		'IsFeatured' => 'Boolean',
	);

	private static $layout_types = array(
		'MainImage' => 'Big Full Width Image',
		'BackgroundImage' => 'Background Image',
		'ImageSlider' => 'Image Slider',
		'BackgroundVideo' => 'Background Video'
	);

	public function getCMSFields() {
		$this->extend('updateCMSFields', $fields);

		return $fields;
	}

	public function updateCMSFields(FieldList $fields) {


		$fields->removeByName("BackgroundImage");

		// $fields->addFieldToTab("blog-admin-sidebar", new TextField('StoryBy', 'Story author'));
		// $fields->addFieldToTab("blog-admin-sidebar", new TextField('StoryByEmail', 'Author email address'));
		// $fields->addFieldToTab("blog-admin-sidebar", new TextField('StoryByTitle', 'Author posiiton title'));
		// $fields->addFieldToTab("blog-admin-sidebar", new TextField('StoryByDept', 'Author department title'));
		$fields->addFieldToTab('Root.Main', new CheckboxField('IsFeatured','Feature this Article? (Yes)'), "Content");
		$fields->addFieldToTab("blog-admin-sidebar", new TextField('PhotosBy', 'Photos or video by'));
		$fields->addFieldToTab("blog-admin-sidebar", new TextField('PhotosByEmail', 'Photographer email address'));
		$fields->addFieldToTab("Root.Main", new TextField('ExternalURL', 'External URL (if story lives elsewhere)'), 'Content');


		if ($this->owner->ClassName == "BlogEntry") {
			//$fields->removeByName("Date");
		} else {
			$fields->renameField("Date", "Published Date");
		}

	}

	public function RelatedNewsEntries(){
		$holder = Blog::get()->First();
		$tags = $this->owner->Tags()->limit(6);
		$entries = new ArrayList();

		foreach($tags as $tag){
			$taggedEntries = $tag->BlogPosts()->exclude(array("ID"=>$this->owner->ID))->sort('PublishDate', 'ASC')->Limit(3);
			if($taggedEntries){
				foreach($taggedEntries as $taggedEntry){
					if($taggedEntry->ID){
						$entries->push($taggedEntry);
					}
				}
			}

		}

		if($entries->count() > 1){
			$entries->removeDuplicates();
		}
		return $entries;
	}


}
<?php

use SilverStripe\Blog\Model\Blog;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataExtension;

class BlogFieldExtension extends DataExtension {

	private static $db = array(
		'StoryBy' => 'Text',
		'StoryByEmail' => 'Text',
		'StoryByTitle' => 'Text',
		'StoryByDept' => 'Text',
		'PhotosBy' => 'Text',
		'PhotosByEmail' => 'Text',
		'ExternalURL' => 'Text',
		'IsFeatured' => 'Boolean',
		'FeaturedImageAltText' => 'Text',
	);

	private static $layout_types = array(
		'MainImage' => 'Big Full Width Image',
		'BackgroundImage' => 'Background Image',
		'ImageSlider' => 'Image Slider',
		'BackgroundVideo' => 'Background Video',
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
		// $fields->addFieldToTab('Root.Main', new CheckboxField('IsFeatured','Feature this Article? (Yes)'), "Content");
		$fields->addFieldToTab('Root.Main', new TextField('FeaturedImageAltText', 'Featured Image Alt Text'), 'CustomSummary');
		$fields->addFieldToTab("Root.Main", new TextField('PhotosBy', 'Photos or video by'));
		$fields->addFieldToTab("Root.Main", new TextField('PhotosByEmail', 'Photographer email address'));
		$fields->addFieldToTab("Root.Main", new TextField('ExternalURL', 'External URL (if story lives elsewhere)'), 'Content');
		$fields->removeByName('Metadata');
		$summary = $fields->dataFieldByName('Summary');
		$summary->addExtraClass('stacked');
		$fields->removeByName('FeaturedInWidget');

	}

	public function RelatedNewsEntries() {
		$holder = Blog::get()->First();
		$tags = $this->owner->Tags()->limit(6);
		$cats = $this->owner->Categories()->limit(6);
		$entries = new ArrayList();

		foreach ($tags as $tag) {
			$taggedEntries = $tag->BlogPosts()->exclude(array("ID" => $this->owner->ID))->sort('PublishDate', 'DESC')->Limit(3);
			if ($taggedEntries) {
				foreach ($taggedEntries as $taggedEntry) {
					if ($taggedEntry->ID) {
						$entries->push($taggedEntry);
					}
				}
			}

		}
		foreach ($cats as $cat) {
			$taggedEntries = $cat->BlogPosts()->exclude(array("ID" => $this->owner->ID))->sort('PublishDate', 'DESC')->Limit(3);

			if ($taggedEntries) {
				foreach ($taggedEntries as $taggedEntry) {
					if ($taggedEntry->ID) {
						$entries->push($taggedEntry);
					}
				}
			}

		}

		if ($entries->count() > 1) {
			$entries->removeDuplicates();
		}
		return $entries;
	}

	public function ExternalURLText() {

		$domains = array(
			'now.uiowa.edu' => 'Read more on Iowa Now',
			'afterclass.uiowa.edu' => 'See event on After Class',
			'events.uiowa.edu' => 'See event on the UI Event Calendar',
		);

		$externalURL = $this->owner->ExternalURL;
		$externalURLParts = parse_url($externalURL);
		$externalHost = $externalURLParts["host"];

		if (isset($domains[$externalHost])) {
			return $domains[$externalHost];
		} else {
			return 'Read more';
		}
	}
	public function getAuthorImageURL($postAuthor) {

		if ($postAuthor->BlogProfileImage()->exists()) {
			return $postAuthor->BlogProfileImage()->AbsoluteURL;
		}

		return false;

	}

}

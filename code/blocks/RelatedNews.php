<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Blog\Model\Blog;
use SilverStripe\Blog\Model\BlogTag;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\ArrayList;
use SilverStripe\TagField\TagField;

class RelatedNewsBlock extends BaseElement {

	private static $db = array(

	);

	private static $has_one = array(
		'Blog' => Blog::class,

	);
	private static $many_many = array(
		'PageTags' => BlogTag::class,
	);
	private static $table_name = 'RelatedNewsBlock';

	public function getType() {
		return 'Related News Block';
	}

	public function getCMSFields() {
		$this->beforeUpdateCMSFields(function (FieldList $fields) {

			$tags = BlogTag::get();
			$tagField = TagField::create(
				'PageTags',
				'Show news tagged with:',
				$tags,
				$this->PageTags()
			)
				->setCanCreate(true)
				->setShouldLazyLoad(true);
			$fields->addFieldToTab('Root.Main', $tagField);

			$treeField = DropdownField::create('BlogID', 'Choose a blog to retrieve posts from', Blog::get()->map());
			$treeField->setEmptyString('(Any blog on this site)');

			$fields->addFieldToTab('Root.Main', $treeField);

			$fields->renameField('Title', 'Title (default:Related News)');

		});

		return parent::getCMSFields();
	}

	public function RelatedNewsEntries() {

		if ($this->Blog) {
			$holder = $this->Blog;
		} else {
			$holder = null;
		}

		$tags = $this->PageTags()->limit(6);
		$entries = new ArrayList();

		foreach ($tags as $tag) {
			if ($holder) {
				$taggedEntries = $tag->BlogPosts()->filter(array('ParentID' => $holder->ID))->exclude(array("ID" => $this->ID))->sort('PublishDate', 'DESC')->Limit(3);
			} else {
				$taggedEntries = $tag->BlogPosts()->exclude(array("ID" => $this->ID))->sort('PublishDate', 'DESC')->Limit(3);
			}

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

}

<?php
use SilverStripe\Forms\FieldList;

class TopicBlock extends RecentNewsBlock {

	private static $db = array(

	);

	private static $has_one = array(

	);
	private static $many_many = array(

	);

	private static $defaults = array(

	);
	private static $table_name = 'TopicBlock';

	public function getType() {
		return 'Topic Block';
	}

	public function getCMSFields() {
		$this->beforeUpdateCMSFields(function (FieldList $fields) {
			// $fields->removeByName('FilterTagMethod');
			// $fields->removeByName('Tags');
			// $fields->removeByName('Categories');

			// $tags = BlogTag::get();
			// $cats = BlogCategory::get();
			// //Debug::show($tags->map());

			// $fields->addFieldsToTab('Root.Main',
			// 	array(
			// 		$filterBy = DropdownField::create(
			// 		  'FilterBy',
			// 		  'Filter Posts By:',
			// 		  singleton('RecentNewsBlock')->dbObject('FilterBy')->enumValues()
			// 		),

			// 		$tagField = ListboxField::create(
			// 			'Tags',
			// 			'Show news tagged with ANY of the following tags:',
			// 			$tags->map()->toArray()
			// 		)->setMultiple(true),

			// 		$catField = ListboxField::create(
			// 			'Categories',
			// 			'Show news tagged with ANY of the following categories:',
			// 			$cats->map()->toArray()
			// 		)->setMultiple(true),

			// 		$blogField = DropdownField::create('BlogID', 'Choose a blog to retrieve posts from', Blog::get()->map())->setEmptyString('(Any blog on this site)')
			// 	)
			// );

			// $tagField->displayIf('FilterBy')->isEqualTo('Tag');
			// $catField->displayIf('FilterBy')->isEqualTo('Category');
			// $blogField->displayIf('FilterBy')->isEqualTo('Blog');

			// $fields->addFieldToTab('Root.Main', new TextField('Limit', 'Number of posts to show (default: 3)'));
		});

		return parent::getCMSFields();
	}

}

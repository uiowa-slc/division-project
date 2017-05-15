<?php

class RecentNewsBlock extends Block{

	private static $db = array(
		'FilterBy' => "Enum('Blog,Tag,Category')",
		'Limit' => 'Int'

	);

	private static $has_one = array(
		'Blog' => 'Blog'

	);
	private static $many_many = array(
		'Tags' => 'BlogTag',
		'Categories' => 'BlogCategory'
	);

	private static $defaults = array(
		'Limit' => 3
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->renameField('Title', 'Title (default:Recent News)');
		$fields->removeByName('FilterTagMethod');
		$fields->removeByName('Tags');
		$fields->removeByName('Categories');

		$tags = BlogTag::get();
		$cats = BlogCategory::get();
		//Debug::show($tags->map());

		$fields->addFieldsToTab('Root.Main',
			array(
				$filterBy = DropdownField::create(
				  'FilterBy',
				  'Filter Posts By:',
				  singleton('RecentNewsBlock')->dbObject('FilterBy')->enumValues()
				),

				$tagField = ListboxField::create(
					'Tags',
					'Show news tagged with ANY of the following tags:',
					$tags->map()->toArray()
				)->setMultiple(true),

				$catField = ListboxField::create(
					'Categories',
					'Show news tagged with ANY of the following categories:',
					$cats->map()->toArray()
				)->setMultiple(true),

				$blogField = DropdownField::create('BlogID', 'Choose a blog to retrieve posts from', Blog::get()->map())->setEmptyString('(Any blog on this site)')
			)
		);


		$tagField->displayIf('FilterBy')->isEqualTo('Tag');
		$catField->displayIf('FilterBy')->isEqualTo('Category');
		$blogField->displayIf('FilterBy')->isEqualTo('Blog');

		$fields->addFieldToTab('Root.Main', new TextField('Limit', 'Number of posts to show (default: 3)'));
		return $fields;
	}

	public function Entries(){


		$entries = new ArrayList();

		if($this->Limit){
			$limit = $this->Limit;
		}else{
			$limit = 3;
		}

		switch ($this->FilterBy){

			case 'Blog':

				if($this->obj('Blog')->exists()){
					$holder = $this->obj('Blog');
					$entries = BlogPost::get()->filter(array('ParentID' => $holder->ID))->exclude(array('ID' => $this->ID));
				}else{
					$entries = BlogPost::get()->exclude(array('ID' => $this->ID));
				}
				break;

			case 'Tag':
				$tags = $this->Tags();
				foreach($tags as $tag){
					$tagEntries = $tag->BlogPosts();
					$entries->merge($tagEntries);
				}
				break;

			case 'Category':
				$cats = $this->Categories();
				foreach($cats as $cat){
					$catEntries = $cat->BlogPosts();
					$entries->merge($catEntries);
				}
				break;

		}

		return $entries->sort('PublishDate DESC')->limit($limit);
	}

}
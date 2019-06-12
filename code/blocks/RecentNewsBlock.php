<?php

use SilverStripe\Blog\Model\Blog;
use SilverStripe\Blog\Model\BlogTag;
use SilverStripe\Blog\Model\BlogCategory;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\ListboxField;
use SilverStripe\Forms\MultiSelectField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\ArrayList;
use SilverStripe\Blog\Model\BlogPost;
use DNADesign\Elemental\Models\BaseElement;
use UncleCheese\DisplayLogic\Wrapper;

class RecentNewsBlock extends BaseElement{

	private static $db = array(
		'FilterBy' => 'Enum(array("Blog","Tag","Category","Student Life News Department", "Student Life News Tag")',
		'Limit' => 'Int',
		'SortBy' => "Enum('Recent,Random,Featured')",
		'StudentLifeNewsDeptID' => 'Int',
		'StudentLifeNewsTagName' => 'Varchar(255)'
	);

	private static $has_one = array(
		'Blog' => Blog::class

	);
	private static $many_many = array(
		'Tags' => BlogTag::class,
		'Categories' => BlogCategory::class
	);

	private static $defaults = array(
		'Limit' => 3,
		'SortBy' => 'Recent'
	);
	private static $table_name = 'RecentNewsBlock';

	public function getType()
    {
        return 'Recent News Block';
    }

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->renameField('Title', 'Title (default:Recent News)');
		$fields->removeByName('SortBy');
		$fields->removeByName('FilterTagMethod');
		$fields->removeByName('Tags');
		$fields->removeByName('Categories');
		$fields->removeByName('StudentLifeNewsDeptID');
		$fields->removeByName('StudentLifeNewsTagName');

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
					'Show entries tagged with ANY of the following tags:',
					$tags->map()->toArray()
				),

				$catField = ListboxField::create(
					'Categories',
					'Show entries tagged with ANY of the following categories:',
					$cats->map()->toArray()
				),

				$blogField = DropdownField::create('BlogID', 'Choose a blog to retrieve posts from', Blog::get()->map())->setEmptyString('(Any blog on this site)'),

				$deptField = NewsDeptDropdownField::create('StudentLifeNewsDeptID', 'Department'),

				$slTagField = TextField::create('StudentLifeNewsTagName', 'Tag')
			)
		);

		$tagField->displayIf('FilterBy')->isEqualTo('Tag');
		$catField->displayIf('FilterBy')->isEqualTo('Category');
		$blogField->displayIf('FilterBy')->isEqualTo('Blog');

		$slTagField->displayIf('FilterBy')->isEqualTo('Student Life News Tag');
		$deptField->displayIf('FilterBy')->isEqualTo('Student Life News Department');

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
			case 'Student Life News Department':
				$tempHolder = new StudentLifeNewsHolder();
				$tempHolder->DepartmentID = $this->StudentLifeNewsDeptID;
				$entries = $tempHolder->getBlogPostsFromFeed();

			case 'Student Life News Tag':
				$tempHolder = new StudentLifeNewsHolder();
				$tempHolder->DepartmentID = 0;
				$tag = $this->StudentLifeNewsTagName;
				$entries = $tempHolder->getBlogPostsFromFeed('tag', $tag);
			break;

		}

		switch($this->SortBy){
			case 'Random':
				foreach($entries as $entry) {
				    $entry->__Sort = mt_rand();
				}
				$entries = $entries->sort('__Sort');
				break;

			case 'Featured':
				$entries = $entries->sort('IsFeatured, PublishDate DESC');
				break;
			default:
				$entries = $entries->sort('PublishDate DESC');
				break;
		}
		
		return $entries->limit($limit);
	}

}
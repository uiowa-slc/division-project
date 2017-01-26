<?php

class RelatedNewsBlock extends Block{

	private static $db = array(

	);

	private static $has_one = array(

	);
	private static $many_many = array(
		'PageTags' => 'BlogTag',
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();

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

		$fields->renameField('Title', 'Title (default:Related News)');

		return $fields;
	}

	public function RelatedNewsEntries(){
		$holder = Blog::get()->First();
		$tags = $this->PageTags()->limit(6);
		$entries = new ArrayList();

		foreach($tags as $tag){
			$taggedEntries = $tag->BlogPosts()->exclude(array("ID"=>$this->ID))->sort('PublishDate', 'DESC')->Limit(3);
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
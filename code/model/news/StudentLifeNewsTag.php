<?php
class StudentLifeNewsTag extends DataObject {

	private static $db = array(
		'Title' => 'Text',
		'URLSegment' => 'Varchar(155)',
		'ParentID' => 'Int'
	);

	private static $has_many = array(
	);

	private static $allowed_children = array(

	);


	public function getCMSFields() {
		$f = parent::getCMSFields();
		return $f;
	}



	public function Link() {
		//print_r('parent id: '.$this->ParentID);
		$parent = StudentLifeNewsHolder::get()->byID($this->ParentID);
		return $parent->Link('tag/'.$this->URLSegment);
	}

	public static function createFromArray($tagArray){
		$tag = new StudentLifeNewsTag();
		$filter = new URLSegmentFilter();

		$tag->Title = $tagArray;
		$tag->URLSegment = $filter->filter($tag->Title);


		return $tag;
	}

}
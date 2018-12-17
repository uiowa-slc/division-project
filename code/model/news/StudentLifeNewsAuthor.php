<?php

use SilverStripe\Control\Email\Email;
use SilverStripe\ORM\DataObject;
class StudentLifeNewsAuthor extends DataObject {

	private static $db = array(
		'Name' => 'Varchar(155)',
		'Email' => 'Varchar(155)',
		'ImageURL' => 'Varchar(155)',
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
		return $parent->Link('author/'.$this->ID);
	}

	public static function createFromArray($authorArray){
		$author = new StudentLifeNewsAuthor();

		$author->ID = $authorArray['ID'];
		$author->Name = $authorArray['Name'];
		$author->Email = $authorArray['Email'];
		$author->ImageURL = $authorArray['ImageURL'];
		return $author;
	}

}
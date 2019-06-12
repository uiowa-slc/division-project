<?php

use SilverStripe\Core\Config\Config;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\ORM\PaginatedList;
use MD\DivisionProject\StudentLifeNewsHolderController;
use SilverStripe\Control\Controller;

class StudentLifeNewsHolder extends Page {

	private static $db = array(
		'DepartmentID' => 'Int'
	);

	private static $has_one = array(

	);

	private static $has_many = array(
	);

	private static $feed_base = 'https://studentlife.uiowa.edu/news';
	// private static $feed_base = 'http://localhost:8888/student-life-at-iowa/news';

	private static $icon_class = 'font-icon-news';
	public function getCMSFields() {

		$f = parent::getCMSFields();

		$deptDropdownField = new NewsDeptDropdownField('DepartmentID', 'Department');
		$deptDropdownField->setEmptyString('All Student Life News');
		$f->addFieldToTab('Root.Main', $deptDropdownField, 'Content');
	
		return $f;
	}


	public static function getOrCreate(){
		$holder = StudentLifeNewsHolder::get()->First();

		if($holder){
			return $holder;
		}else{
			$newHolder = new StudentLifeNewsHolder();
			return $newHolder;
		}
	}

	public function getBlogPostPagination($start, $filterType = null, $filterTitle = null){
		$feedBase = Config::inst()->get('StudentLifeNewsHolder', 'feed_base');

		$list = new ArrayList();
		$deptId = $this->DepartmentID;

		switch($filterType){

			case 'tag':
				$feedURL = $feedBase.'/departmentNewsFeedByTag/'.$deptId.'/'.$filterTitle;
				break;
			case 'category':
				$feedURL = $feedBase.'/departmentNewsFeedByCat/'.$deptId.'/'.$filterTitle;
				break;
			case 'author':
				$feedURL = $feedBase.'/departmentNewsFeedByAuthor/'.$deptId.'/'.$filterTitle;
				break;
			default:
				$feedURL = $feedBase.'/departmentNewsFeed/'.$deptId;
				break;
		}

		

		if($start != 0){
			$feedURL .='?start='.$start;
		}
		$rawPostFeed = file_get_contents($feedURL);
		$postsArray = json_decode($rawPostFeed, TRUE);

		$count = $postsArray['meta']['postCount'];

		for ($i = 1; $i <= $count; $i++) {
		    $list->push(new ArrayData(array()));
		}

		$paginatedList = new PaginatedList($list, Controller::curr()->getRequest());

		return $paginatedList;

	}

	public function getBlogPostsFromFeed($filterType = null, $filterItem = null, $limit = null, $perPage = 10, $start = 0){

		$feedBase = Config::inst()->get('StudentLifeNewsHolder', 'feed_base');
		$deptId = $this->DepartmentID;

		switch($filterType){
			case 'tag':
				$feedURL = $feedBase.'/departmentNewsFeedByTag/'.$deptId.'/'.$filterItem;
			break;

			case 'category':
				$feedURL = $feedBase.'/departmentNewsFeedByCat/'.$deptId.'/'.$filterItem;
			break;

			case 'author':
				$feedURL = $feedBase.'/departmentNewsFeedByAuthor/'.$deptId.'/'.$filterItem;
			break;

			default:
				$feedURL = $feedBase.'/departmentNewsFeed/'.$deptId;
			break;
		}
		
		if($start != 0){
			$feedURL .='?start='.$start;
		}
		//print_r($feedURL);
		$rawPostFeed = file_get_contents($feedURL);
		$postsArray = json_decode($rawPostFeed, TRUE);

		$postsList = new ArrayList();

		if(!isset($postsArray['posts'])){
			return;
		}

		foreach($postsArray['posts'] as $postArray){
			$entry = new StudentLifeNewsEntry();
			$entry = $entry->createFromArray($postArray);
			$entry->ParentID = $this->ID;


			$postsList->push($entry);
		}

		//Debug::show($postsList);
		return $postsList;

	}

	public function getSinglePostFromFeed($id){
		$feedBase = Config::inst()->get('StudentLifeNewsHolder', 'feed_base');
		$feedURL = $feedBase.'/departmentNewsPost/'.$id;
		$rawPost= file_get_contents($feedURL);
		$postArray = json_decode($rawPost, TRUE);
		$post = new StudentLifeNewsEntry();
		$post = $post->createFromArray($postArray);

		return $post;
	}
	public function getAuthorNameByID($id){

		$feedBase = Config::inst()->get('StudentLifeNewsHolder', 'feed_base');
		$feedURL = $feedBase.'/authorInfo/'.$id;
		
		$rawAuthor= file_get_contents($feedURL);
		$authorArray = json_decode($rawAuthor, TRUE);

		if($authorArray){
			return $authorArray['Name'];
		}
	}
}
<?php
class StudentLifeNewsHolder extends Page {

	private static $db = array(
		'DepartmentID' => 'Int'
	);

	private static $has_one = array(

	);

	private static $has_many = array(
	);



	public function getCMSFields() {

		$f = parent::getCMSFields();

		$deptDropdownField = new NewsDeptDropdownField('DepartmentID', 'Department');

		$f->addFieldToTab('Root.Main', $deptDropdownField, 'Content');
	
		return $f;
	}
}
class StudentLifeNewsHolder_Controller extends Page_Controller {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array(
		'post',
		'category',
		'tag',
		'go'
	);

	private static $url_handlers = array(
		'$Action//$ID' => 'go'
	);

	public function init() {
		parent::init();
	}

	public function go($request){

		$action = $this->getRequest()->param('Action');
		$id = $this->getRequest()->param('ID');
		$posts = new ArrayList();

		$getVars = $this->getRequest()->getVars();

		if(isset($getVars['start'])){

			$start = intval($getVars['start']);
		}else{
			$start = 0;
		}

		switch($action){

			case '':
				//index action
				$posts = $this->getBlogPostsFromFeed(null, null, null, 10, $start);
				break;
		    case 'post':
		        $post = $this->getSinglePostFromFeed($id);

		        $data = new ArrayData(array(
		        	'Post' => $post
		        ));
		        return $this->customise($data)->renderWith(array('StudentLifeNewsEntry', 'Page'));

		    case 'category':
		       // echo "using category action";
		        break;
		    case 'tag':
		        //echo "use tag action";
		        break;
		    default: 
		    	// If none of the cases above match, we might be attempting to follow an
		   		// old post's link. attempt to redirect to that post:
		    	return $this->redirect($this->Link('post/'.$action), 301);
		    	break;

		}

		$pagination = $this->getBlogPostPagination($start);

		$data = new ArrayData(array(
			'PaginatedList' => $posts,
			'Pagination' => $pagination,
		));

		return $this->customise($data)->renderWith(array('StudentLifeNewsHolder', 'Page'));
	}

	private function getBlogPostPagination($start){
		$feedBase = 'https://hulk.imu.uiowa.edu/student-life-at-iowa/news';
		$list = new ArrayList();
		$deptId = $this->DepartmentID;
		$feedURL = $feedBase.'/departmentNewsFeed/'.$deptId;

		if($start != 0){
			$feedURL .='?start='.$start;
		}

		$rawPostFeed = file_get_contents($feedURL);
		$postsArray = json_decode($rawPostFeed, TRUE);

		$count = $postsArray['meta']['postCount'];

		for ($i = 1; $i <= $count; $i++) {
		    $list->push(new ArrayData(array()));
		}

		$paginatedList = new PaginatedList($list, $this->getRequest());

		return $paginatedList;

	}

	private function getBlogPostsFromFeed($cat = null, $tag = null, $limit = null, $perPage = 10, $start = 0){

		$feedBase = 'https://hulk.imu.uiowa.edu/student-life-at-iowa/news';
		
		$deptId = $this->DepartmentID;
		$feedURL = $feedBase.'/departmentNewsFeed/'.$deptId;
		if($start != 0){
			$feedURL .='?start='.$start;
		}
		//print_r($feedURL);
		$rawPostFeed = file_get_contents($feedURL);
		$postsArray = json_decode($rawPostFeed, TRUE);

		$postsList = new ArrayList();

		foreach($postsArray['posts'] as $postArray){
			$entry = new StudentLifeNewsEntry();
			$entry = $entry->createFromArray($postArray);
			$entry->ParentID = $this->ID;


			$postsList->push($entry);
		}

		//Debug::show($postsList);
		return $postsList;

	}

	private function getSinglePostFromFeed($id){
		$feedBase = 'https://hulk.imu.uiowa.edu/student-life-at-iowa/news';
		$feedURL = $feedBase.'/departmentNewsPost/'.$id;
		$rawPost= file_get_contents($feedURL);
		$postArray = json_decode($rawPost, TRUE);
		$post = new StudentLifeNewsEntry();
		$post = $post->createFromArray($postArray);

		return $post;
	}

}
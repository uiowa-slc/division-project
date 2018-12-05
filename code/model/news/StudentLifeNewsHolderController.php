<?php

use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use Silverstripe\Core\Config\Config;
use Silverstripe\ORM\PaginatedList;
class StudentLifeNewsHolderController extends PageController {

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
		'author',
		'go'
	);

	private static $url_handlers = array(
		'$Action//$ID' => 'go'
	);

	public function init() {
		parent::init();
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

		$paginatedList = new PaginatedList($list, $this->getRequest());

		return $paginatedList;

	}
	public function go($request){
		$filterTitle = '';
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
				$pagination = $this->getBlogPostPagination($start);
				break;
		    case 'post':
		        $post = $this->getSinglePostFromFeed($id);

		        $data = new ArrayData(array(
		        	'Post' => $post
		        ));
		        return $this->customise($data)->renderWith(array('StudentLifeNewsEntry', 'Page'));

		    case 'category':
		       // echo "using category action";
		    	$filterTitle = $id;
		    	$posts = $this->getBlogPostsFromFeed('category', $id, null, 10, $start);
		    	$pagination = $this->getBlogPostPagination($start, 'category', $id);
		        break;
		    case 'tag':
		    	$filterTitle = $id;
		    	$posts = $this->getBlogPostsFromFeed('tag', $id, null, 10, $start);
		    	$pagination = $this->getBlogPostPagination($start, 'tag', $id);
		        //echo "use tag action";
		        break;
		    case 'author':
		    	$filterTitle = $this->getAuthorNameByID($id);
		    	$posts = $this->getBlogPostsFromFeed('author', $id, null, 10, $start);
		    	$pagination = $this->getBlogPostPagination($start, 'author', $id);
		        //echo "use tag action";
		        break;
		    default: 
		    	// If none of the cases above match, we might be attempting to follow an
		   		// old post's link. attempt to redirect to that post:
		    	return $this->redirect($this->Link('post/'.$action), 301);
		    	break;

		}

		

		$data = new ArrayData(array(
			'FilterType' => $action,
			'FilterTitle' => $filterTitle,
			'PaginatedList' => $posts,
			'Pagination' => $pagination,
		));

		return $this->customise($data)->renderWith(array('StudentLifeNewsHolder', 'Page'));
	}


}
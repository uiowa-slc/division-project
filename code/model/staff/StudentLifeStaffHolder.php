<?php
class StudentLifeStaffHolder extends Page {

	private static $db = array(
		'DepartmentID' => 'Int'
	);

	private static $has_one = array(

	);

	private static $has_many = array(
	);

	// private static $feed_base = 'https://studentlife.uiowa.edu/staff';
	 private static $feed_base = 'http://localhost:8888/student-life-at-iowa/staff';
	// private static $feed_base = 'https://hulk.imu.uiowa.edu/student-life-at-iowa/news';

	public function getCMSFields() {

		$f = parent::getCMSFields();

		$deptDropdownField = new StaffDeptDropdownField('DepartmentID', 'Department');

		$f->addFieldToTab('Root.Main', $deptDropdownField);
	
		return $f;
	}

	public static function getOrCreate(){
		$holder = StudentLifeStaffHolder::get()->First();

		if($holder){
			return $holder;
		}else{
			$newHolder = new StudentLifeStaffHolder();
			return $newHolder;
		}
	}

	public function getStaffTeamsFromFeed($filterType = null, $filterItem = null, $limit = null, $perPage = 10, $start = 0){
		$feedBase = Config::inst()->get('StudentLifeStaffHolder', 'feed_base');

		$deptId = $this->DepartmentID;

		switch($filterType){
			default:
				$feedURL = $feedBase.'/departmentStaffFeed/'.$deptId;
			break;
		}

		if($start != 0){
			$feedURL .='?start='.$start;
		}

		$rawTeamFeed = file_get_contents($feedURL);
		$teamsArray = json_decode($rawTeamFeed, TRUE);

		$teamsList = new ArrayList();

		if(!isset($teamsArray['staffTeams'])){
			return;
		}

		foreach($teamsArray['staffTeams'] as $teamArray){
			$team = new StudentLifeStaffTeam();
			$team = $team->createFromArray($teamArray);
			$teamsList->push($team);
		}

		return $teamsList;

	}

	public function getStaffPageFromFeed($id){
		$feedBase = Config::inst()->get('StudentLifeStaffHolder', 'feed_base');
		$feedURL = $feedBase.'/departmentStaffPage/'.$id;
		$rawPost = file_get_contents($feedURL);
		$postArray = json_decode($rawPost, TRUE);
		$post = new StudentLifeStaffPage();
		$post = $post->createFromArray($postArray);
		return $post;
	}

}
class StudentLifeStaffHolder_Controller extends Page_Controller {

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
		'go',
		'person'
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
			case 'person':
		        $person = $this->getStaffPageFromFeed($id);
		        $data = new ArrayData(array(
		        	'Person' => $person
		        ));
		        return $this->customise($data)->renderWith(array('StudentLifeStaffPage', 'Page'));
			case '':
				//index action
				$teams = $this->getStaffTeamsFromFeed(null, null, null, 10, $start);
				break;
		    default: 
		    	// If none of the cases above match, we might be attempting to follow an
		   		// old post's link. attempt to redirect to that post:
		    	return $this->redirect($this->Link('post/'.$action), 301);
		    	break;
		}

		$data = new ArrayData(array(
			'FilterType' => $action,
			'StaffTeams' => $teams,
		));

		return $this->customise($data)->renderWith(array('StudentLifeStaffHolder', 'Page'));
	}

}
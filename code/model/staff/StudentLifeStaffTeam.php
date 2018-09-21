<?php
class StudentLifeStaffTeam extends DataObject {

	private static $db = array(
		'Title' => 'Text',
		'Content' => 'HTMLText',
		'URLSegment' => 'Varchar',
		'ParentID' => 'Int',
		'ExternalURL' => 'Varchar(255)',
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

		$parent = StudentLifeStaffHolder::get()->byID($this->ParentID);

		return $parent->Link('staff/'.$this->URLSegment);

		
	}

	public function createFromArray($array){

		$team = new StudentLifeStaffTeam;
		$staffList = new ArrayList;

		$team->ID = $array['ID'];
		$team->Content = $array['Content'];
		$team->Title = $array['Title'];
		foreach ($array['Staff'] as $staff) {
			$staffitem = StudentLifeStaffPage::createFromArray($staff);
			$staffList->push($staffitem);
			//print_r($staffitem);
		}
		$team->Staff = $staffList;
		$team->URLSegment = $array['URLSegment'];

		return $team;

	}

}
class StudentLifeStaffTeam_Controller extends BlogEntry_Controller {

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
	);

	public function init() {
		parent::init();

	}

}
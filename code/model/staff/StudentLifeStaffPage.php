<?php
class StudentLifeStaffPage extends DataObject {

	private static $db = array(
		'Title' => 'Text',
		'Content' => 'HTMLText',
		'URLSegment' => 'Varchar',
		'ParentID' => 'Int',
		'ExternalURL' => 'Varchar(255)',
		'Position' => 'Text',
		'EmailAddress' => 'Text',
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

		$parent = StudentLifeStaffHolder::get()->First();

		if($parent){
			// print_r($this->URLSegment);
			return $parent->Link('person/'.$this->URLSegment);
		}else{
			return $this->CanonicalURL;
		}
		
	}

	public static function createFromArray($array){

		$staff = new StudentLifeStaffPage;
		$staff->FirstName = $array['FirstName'];
		$staff->LastName = $array['LastName'];
		$staff->EmailAddress = $array['EmailAddress'];
		$staff->Position = $array['Position'];
		$staff->DepartmentName = $array['DepartmentName'];
		$staff->DepartmentURL = $array['DepartmentURL'];
		$staff->ID = $array['ID'];
		$staff->URLSegment = $array['URLSegment'];
		$staff->Photo = $array['Photo'];
		$staff->Phone = $array['Phone'];
		return $staff;

	}

}
class StudentLifeStaffPage_Controller extends BlogEntry_Controller {

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
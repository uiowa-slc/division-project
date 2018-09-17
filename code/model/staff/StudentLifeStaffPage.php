<?php
class StudentLifeStaffPage extends DataObject {

	private static $db = array(
		'Title' => 'Text',
		'Content' => 'HTMLText',
		'URLSegment' => 'Varchar',
		'ParentID' => 'Int',
		'ExternalURL' => 'Varchar(255)',
		'CanonicalURL' => 'Varchar(255)'
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

		if($parent){
			return $parent->Link('staff/'.$this->URLSegment);
		}else{
			return $this->CanonicalURL;
		}

		
	}

	public function createFromArray($array){

		$entry = $this;

		//volatile. TODO: make less volatile for more than one sl news holder
		$parent = StudentLifeStaffHolder::getOrCreate();


		$entry->Title = $array['Title'];
		$entry->URLSegment = $array['URLSegment'];
		$entry->ParentID = $parent->ID;
		$entry->Content = $array['Content'];

		$entry->ExternalURL = $array['ExternalURL'];
		$entry->CanonicalURL = $array['CanonicalURL'];

		return $entry;

	}

	public function AbsoluteLink(){
		return $this->CanonicalURL;
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
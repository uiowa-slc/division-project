<?php

class StaffDeptDropdownField extends DropdownField {
	//private $feedBase = 'https://studentlife.uiowa.edu';
    private $feedBase = 'https://hulk.imu.uiowa.edu/student-life-at-iowa/staff';

	private static $default_category = 0;

	protected $extraClasses = array('dropdown');


	public function __construct($name, $title = null, $source = null, $value = "", $form=null) {

		$feedURL = $this->feedBase.'/departmentListFeed';
		$rawFeed = file_get_contents($feedURL);
		$categoriesArray = json_decode($rawFeed, TRUE);

		foreach($categoriesArray as $key => $category){
			$source[$category['ID']] = $category['Title'];
		}

		parent::__construct($name, ($title===null) ? $name : $title, $source, $value, $form);
		$this->setEmptyString('(No Department)');
	}

	public function Field($properties = array()) {
		return parent::Field();
	}
}

<?php
class LandingSubpage extends Page {

	private static $db = array(

	);
	private static $has_one = array(

	);
	private static $has_many = array(

	);


	public function getCMSFields() {
		$fields = parent::getCMSFields();

		return $fields;
	}

}
class LandingSubpage_Controller extends Page_Controller {

	public static $allowed_actions = array(
	);

	public function init() {
		parent::init();
	}
}
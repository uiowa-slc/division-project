<?php

use MD\DivisionProject\LandingSubPageController;
class LandingSubpage extends Page {

	private static $db = array(

	);
	private static $has_one = array(

	);
	private static $has_many = array(

	);
	private static $can_be_root = false;

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		return $fields;
	}

}
<?php
class CommunicationHolder extends Page {

	private static $db = array(
		
	);

	private static $has_one = array(

	);

	private static $defaults = array(
		'ShowInMenus' => 0
	);
	private static $has_many = array(
	
	);
	

	private static $layout_types = array(
	
	);

	private static $allowed_children = array('CommunicationBlank', 'Communication');

	private static $icon = 'division-project/cms-icons/mail-open.png';

	public function getCMSFields() {
		$f = parent::getCMSFields();
		
		$f->removeByName('Content');
		$f->removeByName('BackgroundImage');
		$f->removeByName('LayoutType');


		return $f;
	}


	
}

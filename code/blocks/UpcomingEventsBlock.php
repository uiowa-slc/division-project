<?php

class UpcomingEventsBlock extends Block{

	private static $db = array(

	);

	private static $has_one = array(

	);

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->renameField('Title', 'Title (default:Upcoming Events)');

		return $fields;
	}

}
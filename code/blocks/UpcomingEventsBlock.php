<?php

class UpcomingEventsBlock extends Block{

	private static $db = array(
		'LimitEvents' => 'Int'
	);

	private static $has_one = array(

	);
	function EventListLimited(){
		$calendar = LocalistCalendar::get()->First();

		$eventList = $calendar->EventList(7);

		return $eventList;
	}
	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->renameField('Title', 'Title (default:Upcoming Events)');

		return $fields;
	}

}
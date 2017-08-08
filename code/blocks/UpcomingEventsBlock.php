<?php

class UpcomingEventsBlock extends Block{

	private static $db = array(
		'LimitEvents' => 'Int',
		'EventTag' => 'Text'
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

	function EventList() {

		if (isset($this->EventTag)) {
			$calendar = LocalistCalendar::get()->First();
			$term = $this->EventTag;

			$termFiltered = urlencode($term);

			$events = $calendar->EventList(
				$days = '200',
				$startDate = null,
				$endDate = null,
				$venue = null,
				$keyword = null,
				$type = $term,
				$distinct = 'true',
				$enableFilter = false,
				$searchTerm = null
			);
			return $events;

		} else {
			return null;
		}

	}

}
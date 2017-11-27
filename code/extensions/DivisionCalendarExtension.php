<?php
class DivisionCalendarExtension extends DataExtension {

	public function EventListLimited($limit){
		return $this->owner->getEventList(null, null, null, $limit);
	}


}

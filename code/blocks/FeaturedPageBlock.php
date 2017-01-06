<?php

class FeaturedPageBlock extends Block{

	private static $db = array(

	);

	private static $has_one = array(
		'PageTree' => 'SiteTree'
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', new TreeDropdownField("PageTreeID", "Select a Page:", "SiteTree"));

		return $fields;
	}

}
<?php

class HomePageFacebookFeature extends HomePageFeature {

	private static $db = array(
		"AlternateFacebookPage" => "Text",
	);

	private static $defaults = array(
		"Title" => "Facebook Page Embed",
	);

	private static $singular_name = "Facebook Page Feature";

	private static $has_one = array(

	);

	private static $default_sort = "SortOrder";

	function getCMSFields() {
		$fields = new FieldList();
		$fields->push(new TextField('AlternateFacebookPage', 'Alternate Facebook Page URL (if left blank, we use the one in the site\'s settings.)'));
		return $fields;
	}

}
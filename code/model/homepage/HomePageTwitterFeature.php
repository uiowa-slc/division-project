<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;

class HomePageTwitterFeature extends HomePageFeature {

	private static $db = array(
		"AltTwitterName" => "Text",
		"WidgetID"       => "Text",
		"HideFooter" => "Boolean"
	);

	private static $defaults = array(
		"Title" => "Twitter Embed",
	);

	private static $singular_name = "Twitter Feature";

	private static $has_one = array(

	);

	private static $default_sort = "SortOrder";

	function getCMSFields() {
		$fields = new FieldList();
		$fields->push(new TextField('TwitterName', 'Alternate Twitter User Name (If left blank, we use the default from the site\'s settings)'));
		$fields->push(new TextField('WidgetID', 'Twitter Widget ID'));
		$fields->push(new CheckboxField('HideFooter', 'Hide the Tweet Composer'));
		return $fields;
	}

}
<?php

class FeaturedPageBlock extends Block{

	private static $db = array(
		"DarkThemeCheck" => "Boolean",
	);

	private static $has_one = array(

	);

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', new CheckboxField('DarkThemeCheck','Use dark background'));

		return $fields;
	}

}
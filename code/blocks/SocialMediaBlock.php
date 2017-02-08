<?php

class SocialMediaBlock extends Block{

	private static $db = array(
		"TwitterUserTimelineURL" => "Text",
		"FacebookPageUrl" => "Text",
	);

	private static $has_one = array(

	);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName("Title");

		$fields->addFieldToTab("Root.Main", new HeaderField( '<br><br><h3>Twitter</h3>', '3', true ) );
		$fields->addFieldToTab("Root.Main", new TextField("TwitterUserTimelineURL", "Twitter Timeline URL"));

		$fields->addFieldToTab("Root.Main", new HeaderField( '<br><br><h3>Facebook</h3>', '3', true ) );
		$fields->addFieldToTab("Root.Main", new TextField("FacebookPageUrl", "Facebook Page URL"));

		return $fields;
	}

}
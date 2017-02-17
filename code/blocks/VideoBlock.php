<?php

class VideoBlock extends Block{

	private static $db = array(
		"YoutubeEmbed" => "Text",
		"VimeoEmbed" => "Text",
	);

	private static $has_one = array(


	);

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName("Title");

		$fields->addFieldToTab('Root.Main', new TextField("YoutubeEmbed","Youtube embed code"));
		$fields->addFieldToTab('Root.Main', new TextField("VimeoEmbed","Vimeo embed code"));


		return $fields;
	}

}
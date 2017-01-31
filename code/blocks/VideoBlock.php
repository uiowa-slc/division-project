<?php

class VideoBlock extends Block{

	private static $db = array(
		"YoutubeEmbed" => "Text",
		"VimeoEmbed" => "Text",
		"VideoSummary" => "HTMLText",
	);

	private static $has_one = array(


	);

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', new TextField("YoutubeEmbed","Youtube embed code"));
		$fields->addFieldToTab('Root.Main', new TextField("VimeoEmbed","Vimeo embed code"));
		$fields->addFieldToTab('Root.Main', new HTMLEditorField("VideoSummary", "Description"));


		return $fields;
	}

}
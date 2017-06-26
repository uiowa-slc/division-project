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

		//$fields->removeByName("Title");

		$fields->addFieldToTab('Root.Main', new TextField("YoutubeEmbed","Youtube id: <a href='https://md.studentlife.uiowa.edu/assets/Uploads/youtubevideoid.jpg' target='_blank'>Help</a>"));
		$fields->addFieldToTab('Root.Main', new TextField("VimeoEmbed","Vimeo id: <a href='https://md.studentlife.uiowa.edu/assets/Uploads/3.png' target='_blank'>Help</a>"));


		return $fields;
	}

}
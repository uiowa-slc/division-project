<?php
class PolicyPageExternal extends Page {

	private static $db = array(
		"ExternalURL"   => "Text",
	);

	private static $singular_name = 'ExternalPage';

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName("StoryBy");
		$f->removeByName("StoryByEmail");
		$f->removeByName("StoryByTitle");
		$f->removeByName("StoryByDept");
		$f->removeByName("PhotosBy");
		$f->removeByName("PhotosByEmail");
		$f->removeByName("Image");
		$f->removeByName("LayoutType");
		$f->removeByName("BackgroundImage");
		$f->removeByName("Content");

		$f->addFieldToTab("Root.Main", new TextField("ExternalURL", "External URL (Please include https://www.)"));

		return $f;
	}
}
class PolicyPageExternal_Controller extends Page_Controller {

	

}
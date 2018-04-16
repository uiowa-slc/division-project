<?php

use SilverStripe\Assets\Image;
use MD\DivisionProject\PolicyPageController;
class PolicyPage extends Page {

	private static $db = array(
	);

	private static $has_one = array(

	);

	private static $has_many = array(
	);

	private static $singular_name = 'Policy';

	private static $plural_name = 'Policies';

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName("StoryBy");
		$f->removeByName("StoryByEmail");
		$f->removeByName("StoryByTitle");
		$f->removeByName("StoryByDept");
		$f->removeByName("PhotosBy");
		$f->removeByName("PhotosByEmail");
		$f->removeByName("ExternalURL");
		$f->removeByName(Image::class);

		return $f;
	}
	public function Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = true, $delimiter = null){
		return parent::Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = true, $delimiter = null);
	}	
	public function PreventSearchEngineIndex() {
		$parent = $this->Parent();

		if ($parent->PolicyYear) {
			return true;
		}
	}
}
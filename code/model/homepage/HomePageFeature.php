<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use PageController;
use SilverStripe\ORM\DataObject;

class HomePageFeature extends DataObject {

	private static $db = array(
		"Title"        => "Varchar(155)",
		"Content"      => "HTMLText",
		"YouTubeEmbed" => "HTMLText",
		"SortOrder"    => "Int",
		"ExternalLink" => "Text",
		'FeedLink'     => 'Text',

	);

	private static $has_one = array(
		"AssociatedPage" => SiteTree::class,
		"Image"          => Image::class,
	);

	private static $default_sort = "SortOrder";

	private static $singular_name = "Feature";
	private static $plural_name   = "Features";

	function getCMSFields() {
		$fields = new FieldList();

		$fields->push(new TextField('Title', 'Title'));

		$fields->push(new TreeDropdownField("AssociatedPageID", "Link to this page", SiteTree::class));

		$fields->push(new TextField("ExternalLink", "Use this external link instead of the selected page"));
		$fields->push(new TextField("FeedLink", "Display posts from the following feed (only RSS for now)"));
		$fields->push(new HTMLEditorField('Content', 'Content'));

		$fields->push(new UploadField(Image::class, "Image (use 350 x 197 pixels exactly to avoid resampling)"));
		$fields->push(new TextField("YouTubeEmbed", "Use a YouTube embed code instead of an image:"));

		return $fields;
	}

	public function FeedItems() {

		if ($this->FeedLink) {
			$controller = new PageController();
			$feedItems  = $controller->RSSDisplay(5, $this->FeedLink);
			return $feedItems;
		}

	}

	public function forTemplate() {
		//print_r(HomePageFeature::$extra_methods);
		return $this->renderWith($this->ClassName);
	}

}
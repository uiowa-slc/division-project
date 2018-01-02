<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\ORM\DataObject;

class NewHomePageHeroFeature extends DataObject {

	private static $db = array(
		"Title" => "Varchar(155)",
		"SortOrder" => "Int",
		"ExternalLink" => "Text",
		"ButtonText" => "Text",

	);

	private static $has_one = array(
		"AssociatedPage" => SiteTree::class,
		"Image" => Image::class,
		"Video" => Image::class,
		"VideoPoster" => Image::class,
	);

	private static $default_sort = "SortOrder";
	private static $singular_name = "Media Slide";
	private static $plural_name = "Media Slides";
	private static $summary_fields = array(
		"Title",
		"Thumbnail",
	);

	function getThumbnail() {
		return $this->Image()->CMSThumbnail();
	}

	function getCMSFields() {
		$fields = new FieldList();

		$fields->push(new TextField('Title', 'Title'));
		$fields->push(new UploadField(Image::class, Image::class));
		$fields->push(new UploadField("Video", "Video"));
		$fields->push(new UploadField("VideoPoster", "Poster image if using video"));
		$fields->push(new TreeDropdownField("AssociatedPageID", "Link to this page", SiteTree::class));
		$fields->push(new TextField('ExternalLink', 'Use the external link instead:'));
		$fields->push(new TextField('ButtonText', 'Button Text'));

		return $fields;
	}

	function getCMSValidator() {
		return new RequiredFields(array('Title', 'ButtonText'));
	}

}
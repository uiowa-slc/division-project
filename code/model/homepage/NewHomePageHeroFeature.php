<?php

class NewHomePageHeroFeature extends DataObject {

	private static $db = array(
		"Title" => "Varchar(155)",
		"SortOrder" => "Int",
		"ExternalLink" => "Text",
		"ButtonText" => "Text",

	);

	private static $has_one = array(
		"AssociatedPage" => "SiteTree",
		"Image" => "Image",
		"Video" => "Image",
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
		$fields->push(new UploadField("Image", "Image"));
		$fields->push(new UploadField("Video", "Video"));
		$fields->push(new TreeDropdownField("AssociatedPageID", "Link to this page", "SiteTree"));
		$fields->push(new TextField('ExternalLink', 'Use the external link instead:'));
		$fields->push(new TextField('ButtonText', 'Button Text'));

		return $fields;
	}

	function getCMSValidator() {
		return new RequiredFields(array('Title', 'ButtonText'));
	}

}
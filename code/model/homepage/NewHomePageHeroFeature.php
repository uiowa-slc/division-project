<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Assets\File;

class NewHomePageHeroFeature extends DataObject {

	private static $db = array(
        "Title" => "Varchar(155)",
        "Content" => "HTMLText",
		"SortOrder" => "Int",
		"ExternalLink" => "Text",
		"ButtonText" => "Text",

	);

	private static $has_one = array(
		"AssociatedPage" => SiteTree::class,
		"Image" => Image::class,
	);
    private static $owns = array(
    	'Image',
    );
	private static $default_sort = "SortOrder";
	private static $singular_name = "Media Slide";
	private static $plural_name = "Media Slides";
	private static $summary_fields = array(
		"Title",
		"Thumbnail",
	);
	private static $extensions = [
        Versioned::class
    ];
	function getThumbnail() {
		return $this->Image()->CMSThumbnail();
	}

	function getCMSFields() {
		$fields = new FieldList();

		$fields->push(new TextField('Title', 'Title'));
		$fields->push(new UploadField("Image", "Image"));
        $fields->push(HTMLEditorField::create('Content', 'Content')->addExtraClass('stacked'));
		$fields->push(new TreeDropdownField("AssociatedPageID", "Link to this page", SiteTree::class));
		$fields->push(new TextField('ExternalLink', 'Use the external link instead:'));
		$fields->push(new TextField('ButtonText', 'Button Text'));

		return $fields;
	}

	// function getCMSValidator() {
	// 	return new RequiredFields(array('Title', 'ButtonText'));
	// }

}

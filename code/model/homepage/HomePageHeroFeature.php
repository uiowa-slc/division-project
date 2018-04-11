<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataObject;


class HomePageHeroFeature extends DataObject {

	private static $db = array(
		"Title" => "Varchar(155)",
		"Content" => "HTMLText",
		"SortOrder" => "Int",
		"ExternalLink" => "Text",
		"UseExternalLink" => "Boolean",

	);

	private static $has_one = array(
		"AssociatedPage" => SiteTree::class,
		"Image" => Image::class,
	);

	private static $default_sort = "SortOrder";

	private static $singular_name = "Hero Feature";
	private static $plural_name = "Hero Features";
	private static $extensions = array(
		'Heyday\VersionedDataObjects\VersionedDataObject'
	);
	function getCMSFields() {
		$fields = new FieldList();

		$fields->push(new TextField('Title', 'Title'));

		$fields->push(new UploadField(Image::class, Image::class));
		$fields->push(new TreeDropdownField("AssociatedPageID", "Link to this page", SiteTree::class));
		$fields->push(new TextField('ExternalLink', 'Use the external link instead:'));
		$fields->push(new HTMLEditorField('Content', 'Content'));

		return $fields;
	}

}
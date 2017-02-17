<?php

class FeaturedPageBlock extends Block{

	private static $db = array(
		"FeaturePageSummary" => "HTMLText",
		'UseBackground' => 'Boolean',
		'FeaturePageExternalUrl' => 'Text',
	);

	private static $has_one = array(
		'PageTree' => 'SiteTree',
		"FeaturePagePhoto" => "Image"
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', new TreeDropdownField("PageTreeID", "Select a Page:", "SiteTree"));
		$fields->addFieldToTab('Root.Main', new CheckboxField('UseBackground','Use image as background'));
		$fields->addFieldToTab("Root.Main", new TextField("FeaturePageExternalUrl", "Use external website URL"));
		$fields->addFieldToTab("Root.Main", new HeaderField( '<br><hr><br><h3>Overwrite Page Settings</h3>', '3', true ) );
		$fields->addFieldToTab("Root.Main", new UploadField("FeaturePagePhoto", "Add an image"));

		$fields->addFieldToTab('Root.Main', $myEditorField = new HTMLEditorField("FeaturePageSummary", "Summary Text"));
		$myEditorField->setRows(12);

		return $fields;
	}

}
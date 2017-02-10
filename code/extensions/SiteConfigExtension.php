<?php

class SiteConfigExtension extends DataExtension {

	static $db = array(
		'TwitterLink' => 'Text',
		'Address' => 'Text',
		'PhoneNumber' => 'Text',
		'FacebookLink' => 'Text',
		'GroupSummary' => 'HTMLText',
		'EmailAddress' => 'Text',
		'VimeoLink' => 'Text',
		'LinkedInLink' => 'Text',
		'InstagramLink' => 'Text',
		'PinterestLink' => 'Text',
		'FlickrLink' => 'Text',
		'YouTubeLink' => 'Text',
		'DisableDivisionBranding' => 'Boolean',
		'ShowExitButton' => 'Boolean',
		'UseDarkTheme' => 'Boolean',
		'MailChimpFormEmbed' => 'HTMLText'
	);

	static $has_one = array(
		'PosterImage' => 'Image'
	);

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab('Root.Main', new CheckboxField('UseDarkTheme', 'Use Dark header throughout site'));
		$fields->addFieldToTab('Root.Main', new CheckboxField('DisableDivisionBranding', 'Disable Division of Student Life branding elements'));
		$fields->addFieldToTab('Root.Main', new CheckboxField('ShowExitButton', 'Show Exit Button'));

		$fields->addFieldToTab('Root.Main', new UploadField('PosterImage', 'Facebook Share Image (1200 x 630)'));

		$fields->addFieldToTab('Root.Main', new HTMLEditorField('GroupSummary', 'Group Summary'));

		$fields->addFieldToTab('Root.Main', new TextareaField('Address', 'Organization Address'));
		$fields->addFieldToTab('Root.Main', new TextareaField('PhoneNumber', 'Phone Number(s)'));
		$fields->addFieldToTab('Root.Main', new TextareaField('EmailAddress', 'Email Address'));

		$fields->addFieldToTab("Root.Main", new HeaderField( '<br><h3>Social Media</h3>', '3', true ) );
		$fields->addFieldToTab('Root.Main', new TextField('TwitterLink', 'Twitter Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('FacebookLink', 'Facebook Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('VimeoLink', 'Vimeo Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('YouTubeLink', 'YouTube Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('LinkedInLink', 'LinkedIn Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('InstagramLink', 'Instagram Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('PinterestLink', 'Pinterest Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('FlickrLink', 'Flickr Account URL'));

		$fields->addFieldToTab("Root.Main", new HeaderField( '<br><h3>Newsletter Signup</h3>', '3', true ) );
		$fields->addFieldToTab('Root.Main', new TextareaField('MailChimpFormEmbed', 'MailChimp Form Embed Code'));

		$fields->addFieldToTab("Root.Main", $MailChimpFormEmbed = new TextareaField("MailChimpFormEmbed", "MailChimp Form Embed Code"));
		$MailChimpFormEmbed->setDescription("More info: <a href='' target='_blank'>How to get this code &rarr;</a>");

		return $fields;
	}

}
class SiteConfigExtensionPage_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}

}
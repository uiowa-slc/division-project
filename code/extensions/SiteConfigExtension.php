<?php

use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Parsers\URLSegmentFilter;
use SilverStripe\ORM\DataExtension;
use MD\DiisionProject\SiteConfigExtensionPageController;

class SiteConfigExtension extends DataExtension {

	private static $db = array(
		'TwitterLink' => 'Text',
		'Address1' => 'Text',
		'City' => 'Text',
		'State' => 'Text',
		'Zipcode' => 'Text',
		'PhoneLabel' => 'Text',
		'PhoneNumber' => 'Text',
		'PhoneLabelAlt' => 'Text',
		'PhoneNumberAlt' => 'Text',
		'Fax' => 'Text',
		'FacebookLink' => 'Text',
		'GroupSummary' => 'HTMLText',
		'EmailAddress' => 'Text',
		'VimeoLink' => 'Text',
		'LinkedInLink' => 'Text',
		'InstagramLink' => 'Text',
		'PinterestLink' => 'Text',
		'FlickrLink' => 'Text',
		'YouTubeLink' => 'Text',
		'Github' => 'Text',
		'Snapchat' => 'Text',
		'DisableDivisionBranding' => 'Boolean',
		'ShowExitButton' => 'Boolean',
		'UseDarkTheme' => 'Boolean',
		'MailChimpFormEmbed' => 'HTMLText',
		'ButtonTextOne' => 'Text',
		'ButtonUrlOne' => 'Text',
		'ButtonTextTwo' => 'Text',
		'ButtonUrlTwo' => 'Text',
		'ButtonTextThree' => 'Text',
		'ButtonUrlThree' => 'Text',
		'QuickLinkTitleOne' => 'Text',
		'QuickLinkTitleTwo' => 'Text',
		'QuickLinkTitleThree' => 'Text',
		'QuickLinkURLOne' => 'Text',
		'QuickLinkURLTwo' => 'Text',
		'QuickLinkURLThree' => 'Text',
		'Disclaimer' => 'HTMLText'
	);

	private static $has_one = array(
		'PosterImage' => Image::class,
		'FooterLogo' => Image::class
	);

	private static $owns = array(
		'PosterImage',
		'FooterLogo'
	);
	private static $defaults = array(
		'TypeKitID' => 'ggu1mkb'
	);

	public function updateCMSFields(FieldList $fields) {

		$fields->addFieldToTab('Root.Main', new UploadField('PosterImage', 'Default Social Media Share Image (1200 x 630)'));
		$fields->addFieldToTab('Root.Main', new CheckboxField('UseDarkTheme', 'Use Dark Header Throughout Site'));
		$fields->addFieldToTab('Root.Main', new CheckboxField('DisableDivisionBranding', 'Disable Division Of Student Life Branding Elements'));

		$fields->addFieldToTab('Root.Main', new CheckboxField('ShowExitButton', 'Show Exit Button'));
		$fields->addFieldToTab('Root.Main', new UploadField('FooterLogo', 'Custom Logo for use in footer'));
		

		$fields->addFieldToTab('Root.Main', new HTMLEditorField('GroupSummary', 'Group Summary'));

		$fields->addFieldToTab("Root.Main", new HeaderField( 'Address', 'Address', true ) );
		$fields->addFieldToTab('Root.Main', new TextField('Address1', 'Street Address'));
		$fields->addFieldToTab('Root.Main', new TextField('City', 'City'));
		$fields->addFieldToTab('Root.Main', new TextField('State', 'State'));
		$fields->addFieldToTab('Root.Main', new TextField('Zipcode', 'Zip Code'));
		$fields->addFieldToTab('Root.Main', new TextField('Fax', 'Fax Number'));
		$fields->addFieldToTab('Root.Main', new TextField('PhoneLabel', 'Phone Label (Phone:)'));
		$fields->addFieldToTab('Root.Main', new TextField('PhoneNumber', 'Main Phone Number'));
		$fields->addFieldToTab('Root.Main', new TextField('PhoneLabelAlt', 'Alternate Phone Label'));
		$fields->addFieldToTab('Root.Main', new TextField('PhoneNumberAlt', 'Alternate Phone Number'));
		$fields->addFieldToTab('Root.Main', new TextField('EmailAddress', 'Email Address'));

		$fields->addFieldToTab("Root.Main", new HeaderField( 'FooterButtons', 'Footer Buttons') );
		$fields->addFieldToTab('Root.Main', new TextField('ButtonTextOne', 'Button Title'));
		$fields->addFieldToTab('Root.Main', new TextField('ButtonUrlOne', 'Button URL'));
		$fields->addFieldToTab('Root.Main', new TextField('ButtonTextTwo', 'Button Title'));
		$fields->addFieldToTab('Root.Main', new TextField('ButtonUrlTwo', 'Button URL'));
		$fields->addFieldToTab('Root.Main', new TextField('ButtonTextThree', 'Button Title'));
		$fields->addFieldToTab('Root.Main', new TextField('ButtonUrlThree', 'Button URL'));

		$fields->addFieldToTab("Root.Main", new HeaderField( 'SocialMedia', 'Social Media'));
		$fields->addFieldToTab('Root.Main', new TextField('TwitterLink', 'Twitter Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('FacebookLink', 'Facebook Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('VimeoLink', 'Vimeo Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('YouTubeLink', 'YouTube Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('LinkedInLink', 'LinkedIn Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('InstagramLink', 'Instagram Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('PinterestLink', 'Pinterest Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('FlickrLink', 'Flickr Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('Github', 'Github Account URL'));
		$fields->addFieldToTab('Root.Main', new TextField('Snapchat', 'Snapchat Username'));
		$fields->addFieldToTab('Root.Main', HTMLEditorField::create('Disclaimer', 'Additional disclaimer (shows in small text under social media)')->setRows(3));


		$fields->addFieldToTab("Root.Main", new HeaderField('HeaderQuickLinks', 'Header Quick Links') );
		$fields->addFieldToTab('Root.Main', new TextField('QuickLinkTitleOne', 'Quick Link Title'));
		$fields->addFieldToTab('Root.Main', new TextField('QuickLinkURLOne', 'Quick Link URL'));

		$fields->addFieldToTab('Root.Main', new TextField('QuickLinkTitleTwo', 'Quick Link Title'));
		$fields->addFieldToTab('Root.Main', new TextField('QuickLinkURLTwo', 'Quick Link URL'));

		$fields->addFieldToTab('Root.Main', new TextField('QuickLinkTitleThree', 'Quick Link Title'));
		$fields->addFieldToTab('Root.Main', new TextField('QuickLinkURLThree', 'Quick Link URL'));

		$fields->addFieldToTab("Root.Main", new HeaderField( 'NewsletterSignup', 'Newsletter Signup') );
		$fields->addFieldToTab('Root.Main', new TextareaField('MailChimpFormEmbed', 'MailChimp Form Embed Code'));
		$fields->addFieldToTab("Root.Main", $MailChimpFormEmbed = new TextareaField("MailChimpFormEmbed", "MailChimp Form Embed Code"));
		$MailChimpFormEmbed->setDescription("More info: <a href='' target='_blank'>How to get this code &rarr;</a>");

		return $fields;
	}

	public function getTwitterHandle(){
		$config = SiteConfig::current_site_config();

		if($url = $config->TwitterLink){
	  	  if (preg_match("/^https?:\/\/(www\.)?twitter\.com\/(#!\/)?(?<name>[^\/]+)(\/\w+)*$/", $url, $regs)) {
	  	    return $regs['name'];
	  	  }
		}

		return false;

	}

	public function UITrackingID(){
		$config = SiteConfig::current_site_config();

		$prefix = 'uiowa.edu.md-';
		$filter = URLSegmentFilter::create();
		$siteName = $config->Title;

		$filteredSiteName = $filter->filter($siteName);

		return $prefix.$filteredSiteName;

	}

}

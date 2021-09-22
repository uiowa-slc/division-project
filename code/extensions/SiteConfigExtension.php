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
        'Address2' => 'Text',
		'City' => 'Text',
		'State' => 'Text',
		'Zipcode' => 'Text',
		'PhoneNumber' => 'Text',
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

		'Disclaimer' => 'HTMLText',

		'CmsCustomLinkTitle' => 'Text',
		'CmsCustomLinkUrl' => 'Text',
		'CmsCustomLinkClass' => 'Text'
	);

	private static $has_one = array(
		'PosterImage' => Image::class,
		'FooterLogo' => Image::class
	);

	private static $owns = array(
		'PosterImage',
		'FooterLogo'
	);

	public function updateCMSFields(FieldList $fields) {

		$fields->addFieldToTab('Root.Main', new UploadField('PosterImage', 'Default Social Media Share Image (1200 x 630)'));
		$fields->addFieldToTab('Root.Main', new CheckboxField('UseDarkTheme', 'Use Dark Header Throughout Site'));
		$fields->addFieldToTab('Root.Main', new CheckboxField('DisableDivisionBranding', 'Disable Division Of Student Life Branding Elements'));

		$fields->addFieldToTab('Root.Main', new CheckboxField('ShowExitButton', 'Show Exit Button'));
		$fields->addFieldToTab('Root.Main', new UploadField('FooterLogo', 'Custom Logo for use in footer'));
		

		$fields->addFieldToTab('Root.Main', HTMLEditorField::create('GroupSummary', 'Group Summary')->addExtraClass('stacked'));

		$fields->addFieldToTab("Root.Main", new HeaderField( 'Address', 'Address', true ) );
		$fields->addFieldToTab('Root.Main', new TextField('Address1', 'Street Address'));
        $fields->addFieldToTab('Root.Main', new TextField('Address2', 'Street Address 2'));
		$fields->addFieldToTab('Root.Main', new TextField('City', 'City'));
		$fields->addFieldToTab('Root.Main', new TextField('State', 'State'));
		$fields->addFieldToTab('Root.Main', new TextField('Zipcode', 'Zip Code'));
		$fields->addFieldToTab('Root.Main', new TextField('Fax', 'Fax Number'));
		$fields->addFieldToTab('Root.Main', new TextField('PhoneNumber', 'Main Phone Number (555-555-5555)'));
		$fields->addFieldToTab('Root.Main', new TextField('PhoneNumberAlt', 'Alternate Phone Number (555-555-5555)'));
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


		$fields->addFieldToTab('Root.Main', new TextField('CmsCustomLinkUrl', 'Custom CMS Link URL'));
		$fields->addFieldToTab('Root.Main', new TextField('CmsCustomLinkTitle', 'Custom CMS Link Title (optional, default: Content Management Guide)'));
		$fields->addFieldToTab('Root.Main', new TextField('CmsCustomLinkClass', 'Custom CMS Link Icon Class (optional, default: font-icon-white-question)'));

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


	// public function populateDefaults() {
	// 	$this->owner->CmsCustomLinkTitle = 'Content Management Guide';
	// 	$this->owner->CmsCustomClass = 'font-icon-white-question';
	// 	parent::populateDefaults();
	// }
}

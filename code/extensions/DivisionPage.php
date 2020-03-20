<?php

use SilverStripe\Assets\Image;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\Core\ClassInfo;
use SilverStripe\Forms\FieldList;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Security\Permission;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\LabelField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataExtension;
use MD\DivisionProject\DivisionPageController;
use DNADesign\Elemental\Models\ElementalArea;
use DNADesign\Elemental\Models\BaseElement;

class DivisionPage extends DataExtension {
	private static $db = array(
		'OgTitle' => 'Text',
		'OgDescription' => 'Text',
		'PreventSearchEngineIndex' => 'Boolean',
		'LayoutType' => 'Varchar(155)',
		'YoutubeBackgroundEmbed' => 'Varchar(11)',
		'ShowChildPages' => 'Boolean(1)',
		'ShowChildrenInDropdown' => 'Boolean(1)',
		'FullImageAltText' => 'Text',
		'DarkMode' => 'Boolean'
	);

	private static $has_one = array(
		'SidebarArea' => ElementalArea::class,
		'AfterContentConstrained' => ElementalArea::class,
		'BeforeContent' => ElementalArea::class,
		'BeforeContentConstrained' => ElementalArea::class,
		'AfterContent' => ElementalArea::class,
		'BackgroundImage' => Image::class,
		'FeatureHolderImage' => Image::class,
		'OgImage' => Image::class
	);
    private static $owns = array(
        'BackgroundImage',
        'OgImage',
        'FeatureHolderImage',
		'BackgroundImage',
		'FeatureHolderImage',
		'SidebarArea',
		'AfterContentConstrained',
		'BeforeContent',
		'BeforeContentConstrained',
		'AfterContent'
    );
	private static $many_many = array(

	);

	private static $belongs_many_many = array(
		'TileGridBlocks' => 'TileGridBlock'
	);

	private static $many_many_extraFields = array(
		'SidebarItems' => array(
			'SortOrder'   => 'Int',
		),
	);

	private static $layout_types = array(
		'BackgroundVideo' => 'Background Video, Overlay',
		'BackgroundImage' => 'Background Image, Overlay',
		'FullImage' => 'Full-sized image, not a background',
		'NoSideNav' => 'No side navigation (even if this page has child pages)'
	);

	private static $plural_name = 'Pages';

	private static $defaults = array(


	);
	private static $hide_from_hierarchy = array(BlogPost::class,'Topic');

	public function ClassAncestry(){
		$ancestryArray = ClassInfo::ancestry($this->owner->ClassName);
		$ancestryString = implode(' ',$ancestryArray);

		return $ancestryString;
	}

	public function updateCMSFields(FieldList $f) {
		// $f = parent::getCMSFields();
		$f->removeByName("ExtraMeta");

		$sidebarAreaField = $f->dataFieldByName('SidebarArea');

		if($sidebarAreaField){
			$sidebarAreaField->setTitle('Sidebar');
			$f->removeByName('SidebarArea');
			$f->addFieldToTab('Root.Blocks', $sidebarAreaField);
		}

		$beforecontentField = $f->dataFieldByName('BeforeContent');

		if($beforecontentField){
			$beforecontentField->setTitle('Before Content');
			$f->remove($beforecontentField);
			$f->addFieldToTab('Root.Blocks', $beforecontentField);
		}

		$beforecontentConstrainedField = $f->dataFieldByName('BeforeContentConstrained');

		if($beforecontentConstrainedField){
			$beforecontentConstrainedField->setTitle('Before Content (Constrained)');
			$f->removeByName('BeforeContentConstrained');
			$f->addFieldToTab('Root.Blocks', $beforecontentConstrainedField);
		}

		$aftercontentAreaField = $f->dataFieldByName('AfterContent');

		if($aftercontentAreaField){
			$aftercontentAreaField->setTitle('After Content');
			$f->removeByName('AfterContent');
			$f->addFieldToTab('Root.Blocks', $aftercontentAreaField);
		}

		$aftercontentConstrainedField = $f->dataFieldByName('AfterContentConstrained');

		if($aftercontentConstrainedField){
			$aftercontentConstrainedField->setTitle('After Content (Constrained)');
			$f->removeByName('AfterContentConstrained');
			$f->addFieldToTab('Root.Blocks', $aftercontentConstrainedField);
		}

		$f->removeByName('ElementalArea');
		$f->removeByName('ContentArea');


		$config = SiteConfig::current_site_config();



		if ($metadataField = $f->fieldByName('Root.Main.Metadata')) {
			$f->removeFieldFromTab('Root.Main', 'Metadata');
			$f->addFieldToTab('Root.MetaData', $metadataField);
		}

		if (Permission::check('ADMIN')) {
			$f->addFieldToTab('Root.Main', new UploadField('BackgroundImage', 'Background Image (at least 1600px wide)'), 'Content');
		}
		$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('SocialMediaInfo','<p>All information placed in the fields below will override any fields filled out in the "Main Content" tab. <br /><em><a href="https://md.studentlife.uiowa.edu/clients/digital-marketing/sharing-content-on-facebook-best-practices/">Sharing content on Facebook: best practices &rarr;</a></em></p>'));

		$f->addFieldToTab("Root.SocialMediaSharing", new UploadField('OgImage', 'Social Share Image'));
		$f->addFieldToTab('Root.SocialMediaSharing', new TextField('OgTitle', 'Social Share Title'));
		$f->addFieldToTab('Root.SocialMediaSharing', new TextareaField('OgDescription', 'Social Share Description'));

	// 	if($this->owner->getExistsOnLive() == true){
	// 		//https://developers.facebook.com/tools/debug/sharing/?q=
	// 		$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('FbShareButton','<a href="https://developers.facebook.com/tools/debug/sharing/?q='.$this->owner->AbsoluteLink().'" target="_blank" type="button" class="ss-ui-button ui-corner-all ui-button ui-widget ui-state-default ui-button-text-icon-primary" title="Share Page On Facebook" role="button" aria-disabled="false"><span class="ui-button-text">
	// Preview Facebook Share</span></a>'));
	// 		$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('FbShareButton','<a href="http://www.facebook.com/sharer/sharer.php?u='.$this->owner->AbsoluteLink().'" target="_blank" type="button" class="ss-button-fb ss-button-social ss-ui-button ui-corner-all ui-button ui-widget ui-state-default ui-button-text-icon-primary" title="Share Page On Facebook" role="button" aria-disabled="false"><span class="ui-button-text">
	// Share Page On Facebook</span></a>'));
	// 		$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('TwitterShareButton','<a href="https://twitter.com/intent/tweet?text='.$this->owner->AbsoluteLink().'" target="_blank" type="button" class="ss-button-twitter ss-button-social ss-ui-button-twitter ss-ui-button ui-corner-all ui-button ui-widget ui-state-default ui-button-text-icon-primary" title="Share Page On Twitter" role="button" aria-disabled="false"><span class="ui-button-text">
	// 		Share Page On Twitter</span></a>'));
	// 	}else{
	// 		$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('ShareNotice','<p>The ability to share this page will appear after you\'ve published it.</p>'));
	// 	}

		$gridFieldConfig = GridFieldConfig_RelationEditor::create();
		$parent = $this->owner->Parent();
		if((isset($parent)) && ($parent->ClassName == 'FeatureHolderPage')){
			$f->addFieldToTab('Root.Main', new UploadField('FeatureHolderImage', 'Feature Holder Image (shown in parent)'), 'Content');
		}


		$f->addFieldToTab('Root.Main', HTMLEditorField::create('Content')->addExtraClass('stacked'));




	}

	public function LayoutTypes(){
		return $this->owner->stat('layout_types');
	}

	public function updateSettingsFields($f) {

		$layoutOptionsField = DropdownField::create(
  			'LayoutType',
  			'Layout type',
  			$this->owner->LayoutTypes()
		)->setEmptyString('(Default Layout)');
		$f->addFieldToTab('Root.Settings', $layoutOptionsField);

		$f->addFieldsToTab("Root.Settings", array(
			$embed = \EdgarIndustries\YouTubeField\YouTubeField::create("YoutubeBackgroundEmbed","Video"
		)), 'LayoutType');
		$embed->displayIf('LayoutType')->isEqualTo('BackgroundVideo');
		$f->addFieldsToTab("Root.Settings", array(
			$fullImgAlt = TextField::create("FullImageAltText","Alt Text For Background Image (required if image has text in it!)"
		)->addExtraClass('stacked')), 'LayoutType');
		$fullImgAlt->displayIf('LayoutType')->isEqualTo('FullImage');		

		$f->addFieldToTab('Root.Settings', CheckboxField::create('PreventSearchEngineIndex', 'Prevent search engines from indexing this page'));
		$f->addFieldToTab('Root.Settings', CheckboxField::create('ShowChildPages','Show child pages if available (Yes)'));
		$f->addFieldToTab('Root.Settings', CheckboxField::create('ShowChildrenInDropdown','Show child pages in a dropdown menu if page is in the top bar (Yes)'));
		$f->addFieldToTab('Root.Settings', CheckboxField::create('DarkMode','Dark Mode (Experimental)'));

	}

	public function getSidebarItems() {
		return $this->owner->getManyManyComponents('SidebarItems')->sort('SortOrder');
	}


	public function getPageTypeTheme(){
		if($this->owner->getPageTypeTheme){
			// print_r($this->getPageTypeTheme);
			return $this->owner->getPageTypeTheme;
		}
	}

	public function DarkLightHeader(){
		$siteConfig = SiteConfig::current_site_config();
		$owner = $this->owner;

		//If the page type forces a particular dark/light scheme (eg homepage), defer to that first.
		if($owner->pageTypeTheme){
			return $owner->pageTypeTheme;
		//Check page's individual CMS setting:
		}elseif($owner->DarkMode){
			return 'dark-header';
		//Otherwise, check global settings
		}elseif($siteConfig->UseDarkTheme){
			return 'dark-header';
		}

		return 'light-header';


	}
	//Frontend labels for various page types when the user sees them in site search results:
	public function NiceName() {
		$niceNames = array(
			'Page'                => '',
			'StaffPage'    		 => 'Staff Member',
			'BlogPost'        	 => 'News',
			'Blog'       		    => '',
			'SiteConfigExtension' => ''
		);
		if(isset($niceNames[$this->owner->ClassName])){
			$niceClassName = $niceNames[$this->owner->ClassName];
			return $niceClassName;
		}else{
			return preg_replace('/([a-z]+)([A-Z])/', '$1 $2', $this->owner->getClassName());
		}
	}

	public function ContentSummary(){

		$str = $this->owner->Content;

		if((empty($str)) || ($str == '')){
			return null;
		}

		$dom = new DOMDocument();
		$dom->loadHTML($str);

		$xp = new DOMXPath($dom);

		$res = $xp->query('//p');

		if($res[0]){
			$firstParagraph = $res[0]->nodeValue;
			return $firstParagraph;			
		}


	}



}

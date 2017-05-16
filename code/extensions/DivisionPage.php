<?php
class DivisionPage extends DataExtension {
	private static $db = array(
		'OgTitle' => 'Text',
		'OgDescription' => 'Text',
		'PreventSearchEngineIndex' => 'Boolean',
		'LayoutType' => 'varchar(155)',
		'YoutubeBackgroundEmbed' => 'Text',
		'ShowChildPages' => 'Boolean(1)'
	);

	private static $has_one = array(
		'BackgroundImage' => 'Image',
		'FeatureHolderImage' => 'Image',
		'OgImage' => 'Image'
	);

	private static $many_many = array(
		'SidebarItems' => 'SidebarItem',
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
		'MainImage' => 'Big Full Width Image',
		'BackgroundImage' => 'Background Image',
		'ImageSlider' => 'Image Slider',
		'BackgroundVideo' => 'Background Video'
	);

	private static $plural_name = 'Pages';

	private static $defaults = array(


	);
	private static $hide_from_hierarchy = array('BlogPost','Topic');

	public function updateCMSFields(FieldList $f) {
		// $f = parent::getCMSFields();

		$f->removeByName("ExtraMeta");
		$config = SiteConfig::current_site_config(); 

		if(!$config->GoogleAnalyticsID) {
			$f->addFieldToTab("Root.Main", new LiteralField("AnalyticsWarning",
				"<p class=\"message warning\">Google Analytics ID hasn't been set for this site. <a href=\"admin/settings/\"><em>You can set it in the site's settings &rarr;</em></a></p>"), "Title");
		}
		if(!$config->TypeKitID) {
			$f->addFieldToTab("Root.Main", new LiteralField("TypeKitWarning",
				"<p class=\"message warning\">Typekit ID hasn't been set for this site. <a href=\"admin/settings/#Root_TypeKit\"><em>You can set it in the site's settings &rarr;</em></a></p>"), "Title");
		}

		if ($metadataField = $f->fieldByName('Root.Main.Metadata')) {
			$f->removeFieldFromTab('Root.Main', 'Metadata');
			$f->addFieldToTab('Root.MetaData', $metadataField);
		}

		if (Permission::check('ADMIN')) {
			$f->addFieldToTab('Root.Main', new UploadField('BackgroundImage', 'Background Image (at least 1600px wide)'), 'Content');
			$layoutOptionsField = DropdownField::create(
	  			'LayoutType',
	  			'Layout type',
	  			$this->owner->LayoutTypes()
			)->setEmptyString('(Default Layout)');
			$f->addFieldToTab('Root.Main', $layoutOptionsField);
		}
		$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('SocialMediaInfo','<p>All information placed in the fields below will override any fields filled out in the "Main Content" tab. <br /><em><a href="https://md.studentlife.uiowa.edu/clients/digital-marketing/sharing-content-on-facebook-best-practices/">Sharing content on Facebook: best practices &rarr;</a></em></p>'));

		$f->addFieldToTab("Root.SocialMediaSharing", new UploadField('OgImage', 'Social Share Image'));
		$f->addFieldToTab('Root.SocialMediaSharing', new TextField('OgTitle', 'Social Share Title'));
		$f->addFieldToTab('Root.SocialMediaSharing', new TextareaField('OgDescription', 'Social Share Description'));

		if($this->owner->getExistsOnLive() == true){
			//https://developers.facebook.com/tools/debug/sharing/?q=
			$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('FbShareButton','<a href="https://developers.facebook.com/tools/debug/sharing/?q='.$this->owner->AbsoluteLink().'" target="_blank" type="button" class="ss-ui-button ui-corner-all ui-button ui-widget ui-state-default ui-button-text-icon-primary" title="Share Page On Facebook" role="button" aria-disabled="false"><span class="ui-button-text">
	Preview Facebook Share</span></a>'));
			$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('FbShareButton','<a href="http://www.facebook.com/sharer/sharer.php?u='.$this->owner->AbsoluteLink().'" target="_blank" type="button" class="ss-button-fb ss-button-social ss-ui-button ui-corner-all ui-button ui-widget ui-state-default ui-button-text-icon-primary" title="Share Page On Facebook" role="button" aria-disabled="false"><span class="ui-button-text">
	Share Page On Facebook</span></a>'));
			$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('TwitterShareButton','<a href="https://twitter.com/intent/tweet?text='.$this->owner->AbsoluteLink().'" target="_blank" type="button" class="ss-button-twitter ss-button-social ss-ui-button-twitter ss-ui-button ui-corner-all ui-button ui-widget ui-state-default ui-button-text-icon-primary" title="Share Page On Twitter" role="button" aria-disabled="false"><span class="ui-button-text">
			Share Page On Twitter</span></a>'));
		}else{
			$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('ShareNotice','<p>The ability to share this page will appear after you\'ve published it.</p>'));
		}

		$gridFieldConfig = GridFieldConfig_RelationEditor::create();
		$parent = $this->owner->Parent();
		if((isset($parent)) && ($parent->ClassName == 'FeatureHolderPage')){
			$f->addFieldToTab('Root.Main', new UploadField('FeatureHolderImage', 'Feature Holder Image (shown in parent)'), 'Content');
		}

		$gridFieldConfig = GridFieldConfig_RelationEditor::create();

		$row = 'SortOrder';
		$gridFieldConfig->addComponent($sort = new GridFieldSortableRows(stripslashes($row)));

		$sort->table          = 'Page_SidebarItems';
		$sort->parentField    = 'PageID';
		$sort->componentField = 'SidebarItemID';

		$gridField = new GridField('SidebarItems', 'Sidebar Items', $this->owner->getSidebarItems(), $gridFieldConfig);

		$f->addFieldToTab('Root.Widgets', new LabelField('SidebarLabel', '<h2>Add sidebar items below</h2>'));

		$f->addFieldsToTab("Root.Main", array(
			$embed = TextField::create("YoutubeBackgroundEmbed","Enter the Youtube embed code.")
      ));

		$embed->displayIf("LayoutType")->isEqualTo("BackgroundVideo");


	}

	public function LayoutTypes(){
		return $this->owner->stat('layout_types');
	}

	public function getSettingsFields() {
		$f = parent::getSettingsFields();
		$f->addFieldToTab('Root.Settings', new CheckboxField('PreventSearchEngineIndex', 'Prevent search engines from indexing this page'));
		$f->addFieldToTab('Root.Settings', new CheckboxField('ShowChildPages','Show child pages if available (Yes)'));

		return $f;

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

	public function DarkLight(){
		$siteConfig = SiteConfig::current_site_config();
		$owner = $this->owner;

		//If the page type forces a particular dark/light scheme (eg homepage), defer to that first.
		if($owner->pageTypeTheme){
			return $owner->pageTypeTheme;
		//Check page's individual CMS setting:
		}elseif($owner->UseDarkThemeOnThisPage){
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

	public function Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = false) {
		$owner = $this->owner;
		print_r($owner->Breadcrumbs());
		// return $this->owner->Breadcrumbs(20, false, false, true);
	}


}

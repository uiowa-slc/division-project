<?php
class Page extends SiteTree {

	private static $db = array(
		'PreventSearchEngineIndex' => 'Boolean',
		'UseDarkThemeOnThisPage' => 'Boolean',
		'LayoutType' => 'varchar(155)'
	);

	private static $has_one = array(
		"BackgroundImage" => "Image",
		'FeatureHolderImage' => 'Image'
	);

	private static $many_many = array(
		"SidebarItems" => "SidebarItem",
	);

	private static $belongs_many_many = array(
		'TileGridBlocks' => 'TileGridBlock'
	);	

	private static $many_many_extraFields = array(
		'SidebarItems' => array(
			'SortOrder'   => 'Int',
		),
	);

	public $layout_types = array(
		'MainImage' => 'Big Full Width Image',
		'ImageSlider' => 'Image Slider',
		'BackgroundVideo' => 'Background Video'
	);

	private static $plural_name = "Pages";

	private static $defaults = array(

		"Content" =>
		"<h1>H1. This is a very large header.</h1>
<p>The first paragraph directly after an H1 is the lede paragraph and is styled with a larger font size than other paragraphs.</p>
<h2>H2. This is a large header.</h2>
<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient.</p>
<h3>H3. This is a medium header.</h3>
<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh ut fermentum massa justo.</p>
<h4>H4. This is a moderate header.</h4>
<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl.</p>
<h5>H5. This is small header.</h5>
<p>Cum sociis natoque penatibus magnis parturient montes, nascetur ridiculus mus. Sed consectetur est.</p>
<h6>H6. This is very small header.</h6>
<p>Donec id elit non mi porta gravida at eget metus. Curabitur blandit tempus porttitor.</p>",

	);

	public function getCMSFields() {
		$f = parent::getCMSFields();
		if (Permission::check('ADMIN')) {
			$f->addFieldToTab("Root.Main", new UploadField("BackgroundImage", "Background Image"), "Content");
			$layoutOptionsField = DropdownField::create(
	  			'LayoutType',
	  			'Layout type',
	  			$this->layout_types
			);
			$f->addFieldToTab('Root.Main', $layoutOptionsField);
		}

		$parent = $this->Parent();
		if((isset($parent)) && ($parent->ClassName == "FeatureHolderPage")){
			$f->addFieldToTab("Root.Main", new UploadField("FeatureHolderImage", "Feature Holder Image (shown in parent)"), "Content");
		}

		$gridFieldConfig = GridFieldConfig_RelationEditor::create();

		if (defined('FLICKR_USER')) {
			$f->renameField('Content', 'Content <a href="https://github.com/StudentLifeMarketingAndDesign/silverstripe-flickr/blob/master/docs/Shortcodes.MD" target="_blank">(Flickr guide&nbsp;&rarr;)</a>');
		}

		$row = "SortOrder";
		$gridFieldConfig->addComponent($sort = new GridFieldSortableRows(stripslashes($row)));

		$sort->table          = 'Page_SidebarItems';
		$sort->parentField    = 'PageID';
		$sort->componentField = 'SidebarItemID';

		$gridField = new GridField("SidebarItems", "Sidebar Items", $this->getSidebarItems(), $gridFieldConfig);

		$f->addFieldToTab("Root.Widgets", new LabelField("SidebarLabel", "<h2>Add sidebar items below</h2>"));
		$f->addFieldToTab("Root.Widgets", new LiteralField("SidebarManageLabel", '<p><a href="admin/sidebar-items" target="_blank">View and Manage Sidebar Items &raquo;</a></p>'));
		$f->addFieldToTab("Root.Widgets", $gridField);// add the grid field to a tab in the CMS

		return $f;

	}

	public function updateSettingsFields(FieldList $f) {
		$f->addFieldToTab('Root.Settings', new CheckboxField('PreventSearchEngineIndex', 'Prevent search engines from indexing this page'));
		$f->addFieldToTab('Root.Settings', new CheckboxField('UseDarkThemeOnThisPage', 'Use dark header on this page only'));

	}

	public function getSidebarItems() {
		return $this->getManyManyComponents('SidebarItems')->sort('SortOrder');
	}

	/** Caching stuff below, have fun. **/

	/**
	 * Return a list of all the pages to cache
	 *
	 * @return array
	 */
	public function allPagesToCache() {
		// Get each page type to define its sub-urls
		$urls = array();
		// memory intensive depending on number of pages
		$pages   = Page::get();
		$ignored = array('UserDefinedForm');
		foreach ($pages as $page) {
			// check to make sure this page is not in the classname
			if (!in_array($page->ClassName, $ignored)) {
				$urls = array_merge($urls, (array) $page->subPagesToCache());
			}
		}
		// add any custom URLs which are not SiteTree instances
		$urls[] = "sitemap.xml";
		return $urls;
	}
	/**
	 * Get a list of URLs to cache related to this page.
	 *
	 * @return array
	 */
	public function subPagesToCache() {
		$urls = array();
		// add current page
		$urls[] = $this->Link();
		return $urls;
	}
	/**
	 * Get a list of URL's to publish when this page changes
	 */
	public function pagesAffectedByChanges() {
		$urls = $this->subPagesToCache();
		if ($p = $this->Parent) {
			$urls = array_merge((array) $urls, (array) $p->subPagesToCache());
		}
		return $urls;
	}

	public function getPageTypeTheme(){
		if($this->getPageTypeTheme){
			// print_r($this->getPageTypeTheme);
			return $this->getPageTypeTheme;
		}
	}

	public function DarkLight(){
		$siteConfig = SiteConfig::current_site_config();
		$owner = $this;
		
		//If the page type forces a particular dark/light scheme (eg homepage), defer to that first.
		if($owner->pageTypeTheme){
			return $owner->pageTypeTheme;
		//Check page's individual CMS setting:
		}elseif($owner->UseDarkThemeOnThisPage){
			return "dark";
		//Otherwise, check global settings
		}elseif($siteConfig->UseDarkTheme){
			return "dark";
		}

		return "light";


	}




}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array(
	);

	public function init() {
		parent::init();

	}
	public function Header($theme = 'auto', $headerType = 'full'){
		$template = new SSViewer('Header');
		$siteConfig = SiteConfig::current_site_config();

		
		//If the page type forces a particular dark/light scheme (eg homepage), defer to that first.
		if($theme == 'auto'){
			if($this->pageTypeTheme){
				$theme = $this->pageTypeTheme;
			//Check page's individual CMS setting:
			}elseif($this->UseDarkThemeOnThisPage){
				$theme = 'dark';
			//Otherwise, check global settings
			}elseif($siteConfig->UseDarkTheme){
				$theme = 'dark';
			//default to light if all else fails:
			}else{
				$theme = 'light';
			}	
		}


		return $template->process($this->customise(new ArrayData(array(
			"DarkLight" => $theme,
			"HeaderType" => $headerType
		))));
	}

	public function Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = false) {
		return parent::Breadcrumbs(20, false, false, true);
	}
}

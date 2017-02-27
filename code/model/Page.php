<?php
class Page extends SiteTree {

	private static $db = array(
		'OgTitle' => 'Text',
		'OgDescription' => 'Text',
		'PreventSearchEngineIndex' => 'Boolean',
		'UseDarkThemeOnThisPage' => 'Boolean',
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

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName("ExtraMeta");

		if ($metadataField = $f->fieldByName('Root.Main.Metadata')) {
			$f->removeFieldFromTab('Root.Main', 'Metadata');
			$f->addFieldToTab('Root.MetaData', $metadataField);
		}

		if (Permission::check('ADMIN')) {
			$f->addFieldToTab('Root.Main', new UploadField('BackgroundImage', 'Background Image (at least 1600px wide)'), 'Content');
			$layoutOptionsField = DropdownField::create(
	  			'LayoutType',
	  			'Layout type',
	  			$this->LayoutTypes()
			)->setEmptyString('(Default Layout)');
			$f->addFieldToTab('Root.Main', $layoutOptionsField);
		}
		$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('SocialMediaInfo','<p>All information placed in the fields below will override any fields filled out in the "Main Content" tab. <br /><a href="https://md.studentlife.uiowa.edu/clients/digital-marketing/sharing-content-on-facebook-best-practices/">Sharing content on Facebook: best practices &rarr;</a></p>'));

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
		$parent = $this->Parent();
		if((isset($parent)) && ($parent->ClassName == 'FeatureHolderPage')){
			$f->addFieldToTab('Root.Main', new UploadField('FeatureHolderImage', 'Feature Holder Image (shown in parent)'), 'Content');
		}

		$gridFieldConfig = GridFieldConfig_RelationEditor::create();

		if (defined('FLICKR_USER')) {
			$f->renameField('Content', 'Content <a href="https://github.com/StudentLifeMarketingAndDesign/silverstripe-flickr/blob/master/docs/Shortcodes.MD" target="_blank">(Flickr guide&nbsp;&rarr;)</a>');
		}

		$row = 'SortOrder';
		$gridFieldConfig->addComponent($sort = new GridFieldSortableRows(stripslashes($row)));

		$sort->table          = 'Page_SidebarItems';
		$sort->parentField    = 'PageID';
		$sort->componentField = 'SidebarItemID';

		$gridField = new GridField('SidebarItems', 'Sidebar Items', $this->getSidebarItems(), $gridFieldConfig);

		$f->addFieldToTab('Root.Widgets', new LabelField('SidebarLabel', '<h2>Add sidebar items below</h2>'));
		// $f->addFieldToTab('Root.Widgets', new LiteralField('SidebarManageLabel', '<p><a href='admin/sidebar-items' target='_blank'>View and Manage Sidebar Items &raquo;</a></p>'));
		$f->addFieldToTab('Root.Widgets', $gridField);// add the grid field to a tab in the CMS


		$f->addFieldsToTab("Root.Main", array(
			$embed = TextField::create("YoutubeBackgroundEmbed","Enter the Youtube embed code.")
      ));

		$embed->displayIf("LayoutType")->isEqualTo("BackgroundVideo");


		return $f;

	}

	public function LayoutTypes(){
		return $this->stat('layout_types');
	}

	public function getSettingsFields() {
		$f = parent::getSettingsFields();
		$f->addFieldToTab('Root.Settings', new CheckboxField('PreventSearchEngineIndex', 'Prevent search engines from indexing this page'));
		$f->addFieldToTab('Root.Settings', new CheckboxField('UseDarkThemeOnThisPage', 'Use dark header on this page only'));
		$f->addFieldToTab('Root.Settings', new CheckboxField('ShowChildPages','Show child pages if available (Yes)'));

		return $f;

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
		$urls[] = 'sitemap.xml';
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
			return 'dark';
		//Otherwise, check global settings
		}elseif($siteConfig->UseDarkTheme){
			return 'dark';
		}

		return 'light';


	}

	public function NiceName() {
		$niceNames = array(
			'Page'                => '',
			'StaffPage'    		 => 'Staff Member',
			'BlogPost'        	 => 'News',
			'Blog'       		    => '',
			'SiteConfigExtension' => ''
		);
		if(isset($niceNames[$this->ClassName])){
			$niceClassName = $niceNames[$this->ClassName];
			return $niceClassName;
		}else{
			return preg_replace('/([a-z]+)([A-Z])/', '$1 $2', $this->getClassName());
		}
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
		'autoComplete',
		'autoCompleteResults'
	);
	private static $url_handlers = array (
		'autoComplete' => 'autoComplete',
		'autoCompleteResults' => 'autoCompleteResults'
	);
	public function init() {
		parent::init();

	}
	private function in_arrayi($needle, $haystack) {
	    return in_array(strtolower($needle), array_map('strtolower', $haystack));
	}

	public function autoCompleteResults($data, $form, $request) {
        $data = array(
            'Results' => $form->getResults(),
            'Query' => $form->getSearchQuery(),
            'Title' => _t('SearchForm.SearchResults', 'Search Results')
        );
        return $this->owner->customise($data)->renderWith(array('Page_results', 'Page'));
    }
	public function autoComplete($request){

		$keyword = trim( $request->requestVar( 'query' ) );

		$keyword = Convert::raw2sql( $keyword );

		$pages = new ArrayList();
		$pagesArray = array();

		$suggestions = array('suggestions' => array());

		$pages = SiteTree::get()->filterAny(array(
		    'Title:PartialMatch' =>  $keyword,
		    // 'Content:PartialMatch' => $keyword
		))->limit(5);


		//$pagesArray = $pages->map()->toArray();
		$pagesArray = $pages->column('Title');
		$suggestions['suggestions'] = $pagesArray;
		// if(!$this->in_arrayi($keyword, $pagesArray)){
		// 	array_unshift($pagesArray, $keyword);
		// }

		return json_encode($suggestions);

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
			'DarkLight' => $theme,
			'HeaderType' => $headerType
		))));
	}

	public function Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = false) {
		return parent::Breadcrumbs(20, false, false, true);
	}
}

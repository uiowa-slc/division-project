<?php
class DivisionPage extends DataExtension {

	private static $db = array(
		'OgTitle' => 'Text',
		'OgDescription' => 'Text',
		'PreventSearchEngineIndex' => 'Boolean',
	);

	private static $has_one = array(
		"BackgroundImage" => "Image",
		'FeatureHolderImage' => 'Image',
		'OgImage' => 'Image'

	);

	private static $many_many = array(
		"SidebarItems" => "SidebarItem",
	);

	private static $many_many_extraFields = array(
		'SidebarItems' => array(
			'SortOrder'   => 'Int',
		),
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

	public function updateCMSFields(FieldList $f) {
		if (Permission::check('ADMIN')) {
			$f->addFieldToTab("Root.Main", new UploadField("BackgroundImage", "Background Image"), "Content");
		}
		$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('SocialMediaInfo','<p>All information placed in the fields below will override any fields filled out in the "Main Content" tab. <br /><a href="https://md.studentlife.uiowa.edu/clients/digital-marketing/sharing-content-on-facebook-best-practices/">Sharing content on Facebook: best practices &rarr;</a></p>'));

		$f->addFieldToTab("Root.SocialMediaSharing", new UploadField('OgImage', 'Social Share Image'));
		$f->addFieldToTab('Root.SocialMediaSharing', new TextField('OgTitle', 'Social Share Title'));
		$f->addFieldToTab('Root.SocialMediaSharing', new TextareaField('OgDescription', 'Social Share Description'));

		if($this->owner->getExistsOnLive() == true){
			$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('FbShareButton','<a href="http://www.facebook.com/sharer/sharer.php?u='.$this->owner->AbsoluteLink().'" target="_blank" type="button" class="ss-button-fb ss-button-social ss-ui-button ui-corner-all ui-button ui-widget ui-state-default ui-button-text-icon-primary" title="Share Page On Facebook" role="button" aria-disabled="false"><span class="ui-button-text">
	Share Page On Facebook</span></a>'));
			$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('TwitterShareButton','<a href="https://twitter.com/intent/tweet?text='.$this->owner->AbsoluteLink().'" target="_blank" type="button" class="ss-button-twitter ss-button-social ss-ui-button-twitter ss-ui-button ui-corner-all ui-button ui-widget ui-state-default ui-button-text-icon-primary" title="Share Page On Twitter" role="button" aria-disabled="false"><span class="ui-button-text">
			Share Page On Twitter</span></a>'));
		}else{
			$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('ShareNotice','<p>The ability to share this page will appear after you\'ve published it.</p>'));
		}


		$parent = $this->owner->Parent();
		if((isset($parent)) && ($parent->ClassName == "FeatureHolderPage")){
			$f->addFieldToTab("Root.Main", new UploadField("FeatureHolderImage", "Thumbnail (visible in parent page listing only)"), "Content");
		}

		$gridFieldConfig = GridFieldConfig_RelationEditor::create();

		if (defined('FLICKR_USER')) {
			$f->renameField('Content', 'Content <a href="https://github.com/StudentLifeMarketingAndDesign/silverstripe-flickr/blob/master/docs/Shortcodes.MD" target="_blank">(Flickr guide&nbsp;&rarr;)</a>');
		}

		$gridFieldConfig->addComponent(new GridFieldOrderableRows('SortOrder'));

		$gridField = new GridField("SidebarItemsGridField", "Sidebar Items", $this->getSidebarItems(), $gridFieldConfig);

		$f->addFieldToTab("Root.Widgets", new LabelField("SidebarLabel", "<h2>Add sidebar items below</h2>"));
		$f->addFieldToTab("Root.Widgets", new LiteralField("SidebarManageLabel", '<p><a href="admin/sidebar-items" target="_blank">View and Manage Sidebar Items &raquo;</a></p>'));
		$f->addFieldToTab("Root.Widgets", $gridField);// add the grid field to a tab in the CMS

	}

	public function updateSettingsFields(FieldList $f) {
		$f->addFieldToTab('Root.Settings', new CheckboxField('PreventSearchEngineIndex', 'Prevent search engines from indexing this page'));

	}

	public function getSidebarItems() {
		return $this->owner->getManyManyComponents('SidebarItems')->sort('SortOrder');
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
		$urls[] = $this->owner->Link();
		return $urls;
	}
	/**
	 * Get a list of URL's to publish when this page changes
	 */
	public function pagesAffectedByChanges() {
		$urls = $this->owner->subPagesToCache();
		if ($p = $this->owner->Parent) {
			$urls = array_merge((array) $urls, (array) $p->subPagesToCache());
		}
		return $urls;
	}

}

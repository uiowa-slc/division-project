<?php
class DivisionPage extends DataExtension {

	private static $db = array(

	);

	private static $has_one = array(
		"BackgroundImage" => "Image",
	);

	private static $many_many = array(
		"SidebarItems" => "SidebarItem",
	);

	private static $many_many_extraFields = array(
		'SidebarItems' => array(
			'SortOrder' => 'Int',
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
			$f->addFieldToTab("Root.Main", new UploadField("BackgroundImage", "Background Image"));
		}
		$gridFieldConfig = GridFieldConfig_RelationEditor::create();

		$f->addFieldToTab('Root.Main', new LiteralField('ShortcodeDocLink', '<a href="https://github.com/StudentLifeMarketingAndDesign/silverstripe-flickr/blob/master/docs/Shortcodes.MD" target="_blank">How to use shortcodes (Flickr, Staff Spotlight, etc) &rarr;</a>'), 'Content');

		$row = "SortOrder";
		$gridFieldConfig->addComponent($sort = new GridFieldSortableRows(stripslashes($row)));

		$sort->table = 'Page_SidebarItems';
		$sort->parentField = 'PageID';
		$sort->componentField = 'SidebarItemID';

		$gridField = new GridField("SidebarItems", "Sidebar Items", $this->getSidebarItems(), $gridFieldConfig);
		$f->addFieldToTab("Root.Sidebar", new LabelField("SidebarLabel", "<h2>Add sidebar items below</h2>"));
		$f->addFieldToTab("Root.Sidebar", new LiteralField("SidebarManageLabel", '<p><a href="admin/sidebar-items" target="_blank">View and Manage Sidebar Items &raquo;</a></p>'));
		$f->addFieldToTab("Root.Sidebar", $gridField); // add the grid field to a tab in the CMS

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
		$pages = Page::get();
		$ignored = array('UserDefinedForm', 'HomePage');
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

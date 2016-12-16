<?php
class DivisionPage_Controller extends Extension {

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
	public function index($r) {
		$page = $this->owner;
		// print_r($page->ClassName.'_'.$page->LayoutType);
		return $page->renderWith(array($page->ClassName.'_'.$page->LayoutType, $page->ClassName, 'Page'));
	}
	public static function StaffSpotlightHandler($arguments, $content) {
		//example: [spotlight]Faces behind the scenes focuses on a person in the Division every month.[/spotlight]

		$blogHolder = DataObject::get_by_id('Blog', 133);

		$tag = BlogTag::get()->filter(array('Title:PartialMatch' => 'Faces'))->First();

		if ($tag) {
			$latestStaffSpotlight = $tag->BlogPosts()->sort('PublishDate DESC')->First();
			//print_r($latestStaffSpotlight);
			if ($latestStaffSpotlight) {

				$customise = array();
				/*** SET DEFAULTS ***/
				$customise['BlogPage']       = $latestStaffSpotlight;
				$customise['SidebarContent'] = $content;

				//overide the defaults with the arguments supplied
				$customise = array_merge($customise, $arguments);

				//get our YouTube template
				$template = new SSViewer('SidebarSpotlight');

				//return the customised template
				return $template->process(new ArrayData($customise));
			}
		}

	}
	public static function BlogFeedHandler($arguments) {
		//example: [blogfeed page="news" tags="assessment"]Assessment News[/blogfeed]

		if (empty($arguments['page'])) {
			return;
		}

		$pageURLSegment = $arguments['page'];
		$page           = Page::get()->filter("URLSegment", $pageURLSegment)->First();
		//print_r($page);
		if ($page) {

			$customise = array();
			/*** SET DEFAULTS ***/
			$customise['BlogPage'] = $page;
			if (isset($arguments['tag'])) {
				$customise['Tag'] = $arguments['tag'];
				$blogTag          = BlogTag::get()->filter(array('Title:PartialMatch' => $arguments['tag']))->First();

				if (isset($blogTag)) {
					$customise['BlogPosts'] = $blogTag->BlogPosts();
				}

			} else {
				$customise['BlogPosts'] = $page->getBlogPosts();
			}

			//overide the defaults with the arguments supplied
			$customise = array_merge($customise, $arguments);

			//get our YouTube template
			$template = new SSViewer('SidebarBlogFeed');

			//return the customised template
			return $template->process(new ArrayData($customise));
		}

	}

	public static function RSSFeedHandler($arguments) {

		if (empty($arguments['url'])) {
			return;
		}

		$feedURL    = $arguments['url'];
		$controller = new Page_Controller();

		$feedItems = $controller->RSSDisplay(5, $feedURL);

		if ($feedItems) {

			$customise              = array();
			$customise['FeedItems'] = $feedItems;
			$customise              = array_merge($customise, $arguments);

			$template = new SSViewer('SidebarRssFeed');
			//return the customised template
			return $template->process(new ArrayData($customise));
		}
	}

	public static function ButtonHandler($arguments, $caption = null, $parser = null) {

		if (empty($arguments['url'])) {
			return;
		}

		$customise = array();
		/*** SET DEFAULTS ***/
		$customise['Link']    = $arguments['url'];
		$customise['Caption'] = $caption?Convert::raw2xml($caption):false;

		//overide the defaults with the arguments supplied
		$customise = array_merge($customise, $arguments);

		//get our YouTube template
		$template = new SSViewer('Button');

		//return the customised template
		return $template->process(new ArrayData($customise));

	}

}

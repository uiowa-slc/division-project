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
	private static $allowed_actions = array(
	);

	public static function StaffSpotlightHandler($arguments, $content) {
		//example: [spotlight]Faces behind the scenes focuses on a person in the Division every month.[/spotlight]

		$blogHolder = DataObject::get_by_id('BlogHolder', 133);

		$latestStaffSpotlight = $blogHolder->Entries(1, 'faces')->sort('Date DESC')->first();

		if ($latestStaffSpotlight) {

			$customise = array();
			/*** SET DEFAULTS ***/
			$customise['BlogPage'] = $latestStaffSpotlight;
			$customise['SidebarContent'] = $content;

			//overide the defaults with the arguments supplied
			$customise = array_merge($customise, $arguments);

			//get our YouTube template
			$template = new SSViewer('SidebarSpotlight');

			//return the customised template
			return $template->process(new ArrayData($customise));
		}

	}
	public static function BlogFeedHandler($arguments) {
		//example: [blogfeed page="news" tags="assessment"]Assessment News[/blogfeed]

		if (empty($arguments['page'])) {
			return;
		}

		$pageURLSegment = $arguments['page'];
		$page = DataObject::get("Page")->filter("URLSegment", $pageURLSegment)->first();
		//print_r($page);
		if ($page) {

			$customise = array();
			/*** SET DEFAULTS ***/
			$customise['BlogPage'] = $page;
			if (isset($arguments['tag'])) {
				$customise['Tag'] = $arguments['tag'];
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

		$feedURL = $arguments['url'];
		$controller = new Page_Controller();

		$feedItems = $controller->RSSDisplay(5, $feedURL);

		if ($feedItems) {

			$customise = array();
			$customise['FeedItems'] = $feedItems;
			$customise = array_merge($customise, $arguments);

			$template = new SSViewer('SidebarRssFeed');
			//return the customised template
			return $template->process(new ArrayData($customise));
		}
	}

	function getFeedItems($feedURL, $numberToShow = 3) {
		$output = new ArrayList();

		// Protection against infinite loops when an RSS widget pointing to this page is added to this page
		if (stristr($_SERVER['HTTP_USER_AGENT'], 'SimplePie')) {
			return $output;
		}

		if (!class_exists('SimplePie')) {
			throw new LogicException(
				'Please install the "simplepie/simplepie" library by adding it to the "require" '
				+'section of your composer.json'
			);
		}

		$t1 = microtime(true);
		$feed = new SimplePie();
		$feed->set_feed_url($feedURL);
		$feed->set_cache_location(TEMP_FOLDER);
		$feed->init();
		if ($items = $feed->get_items(0, $numberToShow)) {
			foreach ($items as $item) {

				// Cast the Date
				$date = new Date('Date');
				$date->setValue($item->get_date());

				// Cast the Title
				$title = new Text('Title');
				$title->setValue(html_entity_decode($item->get_title()));

				$output->push(new ArrayData(array(
					'Title' => $title,
					'Date' => $date,
					'Link' => $item->get_link(),
				)));
			}
			return $output;
		}
	}

}

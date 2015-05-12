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

	public static function FlickrShortcodeHandler($arguments) {

		$service = new FlickrService();

		$userId = 'imubuddy';
		$service->setApiKey(FLICKR_API_KEY);
		$controller = new DivisionPage_Controller();

		/* [flickr set="xxxxxx"] */
		if (isset($arguments['set'])) {
			$set = $service->getPhotosetById($arguments['set']);
			$type = null;
			$columns = null;
			if (isset($arguments['type'])) {$type = $arguments['type'];}
			if (isset($arguments['columns'])) {$columns = $arguments['columns'];}

			print_r($columns);

			return $controller->buildFlickrSet($set, $type, $columns);

			/* [flickr photo="xxxxxx"] */
		} elseif (isset($arguments['photo'])) {
			$photoId = $arguments['photo'];
			return $controller->buildFlickrSingle($photoId);
		}

	}

	public function buildFlickrSet($set, $type = 'gallery', $columns = 2) {
		$service = new FlickrService();
		$service->setApiKey(FLICKR_API_KEY);

		$photosFromSet = $service->getPhotosInPhotoset($set->id);

		//print_r($photosFromSet);

		$customise = array();
		$customise['Photoset'] = $set;
		$customise['Photos'] = $photosFromSet;
		$customise['Type'] = $type;
		$customise['Columns'] = $columns;

		$template = new SSViewer('FlickrSet');
		//return the customised template
		return $template->process(new ArrayData($customise));

	}

	private function buildFlickrSingle($photo_Id) {
		$service = new FlickrService();
		$service->setApiKey(FLICKR_API_KEY);

		if(!$service->isAPIAvailable()) return null;
		$photo = $service->getPhotoById($photo_Id);

		$customise = array();
		//$customise['PhotoUrl'] = $photo;
		$customise = $photo;
		
		$template = new SSViewer('FlickrSingle');
		//return the customised template
		return $template->process(new ArrayData($customise));

		

	}


}

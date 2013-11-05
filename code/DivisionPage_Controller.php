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
	private static $allowed_actions = array (
	);

	public function onAfterInit() {


		// Note: you should use SS template require tags inside your templates
		// instead of putting Requirements calls here.  However these are
		// included so that our older themes still work
		$stylesheets = array();
		$themeDir = $this->owner->ThemeDir();

		if(Director::fileExists($themeDir . "/css/master.css")) {
	      	 $stylesheets[] = $themeDir . "/css/master.css";
	      } else {
	      	 $stylesheets[] = "division-project/css/master.css";
	      }
	    $stylesheets[] = $themeDir . "/css/site.css";
	   
	    Requirements::set_combined_files_folder('division-project/css');
		Requirements::combine_files('allStyles.css', $stylesheets);

		$scripts = array();

		$scripts[] = $themeDir . "/js/vendor/jquery-1.8.3.min.js";

		$scripts[] = "division-project/js/plugins-ck.js";
		$scripts[] = "division-project/js/main.js";
		$scripts[] = "division-bar/js/division-bar.js";

		$scripts[] = $themeDir . "/js/site.js";
		Requirements::set_combined_files_folder('division-project/js');
		Requirements::combine_files('allScripts.js', $scripts);
	}


	/* Clear Out Empty Lines from SS Template Indents */
	/*public function handleRequest(SS_HTTPRequest $request, DataModel $model) {
		$ret = parent::handleRequest($request, $model);
		$temp=$ret->getBody();
		$temp = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $temp);
		$ret->setBody($temp);
		return $ret;
	} */
	
	public static function StaffSpotlightHandler($arguments, $content){
		//example: [spotlight]Faces behind the scenes focuses on a person in the Division every month.[/spotlight]
		
		$blogHolder = DataObject::get_by_id('BlogHolder', 133);
		
		$latestStaffSpotlight = $blogHolder->Entries(1, 'faces')->sort('Date DESC')->first();
		
		//print_r($blogHolder);
		//$latestStaffSpotlight = BlogEntry::get()->
		if($latestStaffSpotlight){
		 
			$customise = array();
			/*** SET DEFAULTS ***/
			$customise['BlogPage'] = $latestStaffSpotlight;
			$customise['SidebarContent'] = $content;
			 
			//overide the defaults with the arguments supplied
			$customise = array_merge($customise,$arguments);
			 
			//get our YouTube template
			$template = new SSViewer('SidebarSpotlight');
			 
			//return the customised template
			return $template->process(new ArrayData($customise));	
		}	
		
		
		
	}
	public static function BlogFeedHandler($arguments){
		//example: [blogfeed page="news" tags="assessment"]Assessment News[/blogfeed]
		
		if (empty($arguments['page'])) {
		    return;
		}
		
		$pageURLSegment = $arguments['page'];
		$page = DataObject::get("Page")->filter("URLSegment", $pageURLSegment)->first();
		//print_r($page);
		if($page){
		 
			$customise = array();
			/*** SET DEFAULTS ***/
			$customise['BlogPage'] = $page;
			if(isset($arguments['tag'])){
				$customise['Tag'] = $arguments['tag'];
			}
			//$customise['Title'] = $title ? Convert::raw2xml($title) : false;
			 
			//overide the defaults with the arguments supplied
			$customise = array_merge($customise,$arguments);
			 
			//get our YouTube template
			$template = new SSViewer('SidebarBlogFeed');
			 
			//return the customised template
			return $template->process(new ArrayData($customise));	
		}	
		
	}

}
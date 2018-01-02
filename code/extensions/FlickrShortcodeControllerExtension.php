<?php

use SilverStripe\View\SSViewer;
use SilverStripe\View\ArrayData;
use SilverStripe\Core\Extension;

class FlickrShortcodeControllerExtension extends Extension {

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

	public static function FlickrShortcodeHandler($arguments) {

		$controller = new FlickrShortcodeControllerExtension();


		if (isset($arguments['set'])) {$setID = $arguments['set'];}

		return $controller->buildFlickrSet($setID);



	}

	public function buildFlickrSet($set) {
		$template = new SSViewer('FlickrSet');
		$customise = array();
		$customise['Photoset'] = $set;
		$customise['FlickrUser'] = FLICKR_USER;
		// don't call the service (performance woes), just generate an iframe and return it.
		return $template->process(new ArrayData($customise));
	}

}

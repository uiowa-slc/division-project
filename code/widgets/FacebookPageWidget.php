<?php

use SilverStripe\Widgets\Model\Widget;
use SilverStripe\Widgets\Controllers\Widget_Controller;

if (!class_exists(Widget::class)) {
	return;
}

/**
 * @method Blog Blog()
 *
 * @property int $NumberOfPosts
 */
class FacebookPageWidget extends Widget {
	/**
	 * @var string
	 */
	private static $title = 'Facebook Page Embed';

	/**
	 * @var string
	 */
	private static $cmsTitle = 'Facebook Page Embed';

	/**
	 * @var string
	 */
	private static $description = 'Shows a Facebook page with posts';

	/**
	 * {@inheritdoc}
	 */
	public function getCMSFields() {
		return parent::getCMSFields();
	}

}

<?php

use SilverStripe\Blog\Controllers\BlogController;
class TopicHolderController extends BlogController{
	private static $allowed_actions = array(
		'SearchForm'
	);

}
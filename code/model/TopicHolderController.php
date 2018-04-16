<?php

use SilverStripe\Blog\Model\BlogController;
class TopicHolderController extends BlogController{
	private static $allowed_actions = array(
		'SearchForm'
	);

}
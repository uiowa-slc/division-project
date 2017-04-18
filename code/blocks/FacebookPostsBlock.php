<?php
use Olliepop\FBPageFeed\FBPageFeedService;

class FacebookPostsBlock extends Block{

	private static $db = array(

	);

	private static $has_one = array(

	);
	private static $many_many = array(

	);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		return $fields;
	}

	public function Entries(){
        $fbService = new FBPageFeedService();
        return $fbService->getStoredPosts();
	}

}
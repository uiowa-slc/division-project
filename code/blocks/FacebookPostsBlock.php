<?php
use Olliepop\FBPageFeed\FBPageFeedService;

class FacebookPostsBlock extends Block{

	private static $db = array(

	);

	private static $has_one = array(

	);
	private static $many_many = array(

	);

        // $this->appID = $siteConfig->FBAppID;
        // $this->appSecret = $siteConfig->FBAppSecret;
        // $this->accessToken = $siteConfig->FBAccessToken;
	function getCMSFields() {
		$fields = parent::getCMSFields();
		$siteConfig = \SiteConfig::current_site_config();

		if(!($siteConfig->FBAppID && $siteConfig->FBAppSecret && $siteConfig->FBAccessToken && $siteConfig->FBPageID)){
			$fields->addFieldToTab("Root.Main", new LiteralField("BadFbPostsConfigWarning",
				"<p class=\"message warning\">This site is not set up to use Facebook posts properly and this block will not work if you use it right now. <a href=\"admin/settings/\"><em>Please set up the FB app ID, token, and secret in this site's settings</em></a> or email imu-web@uiowa.edu for help.</p>"), "Title");
		}

		return $fields;
	}

	public function Entries(){
        $fbService = new FBPageFeedService();
        return $fbService->getStoredPosts();
	}

}
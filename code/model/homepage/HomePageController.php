<?php
use SilverStripe\ORM\ArrayList;

class HomePageController extends PageController {

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

	public function init() {
		parent::init();

	}
    public function index() {
        $bg = $this->BackgroundFeatures()->Sort('RAND()')->First();

        if($this->ShuffleHomePageFeatures){
            $featuresArray = NewHomePageHeroFeature::get()->toArray();

            shuffle($featuresArray);

            $features = new ArrayList($featuresArray);

        }else{
            $features = NewHomePageHeroFeature::get();
        }

        $page = $this->customise(array(
                'BackgroundFeature' => $bg,
                'NewHomePageHeroFeatures' => $features
            ));
        return $page->renderWith(array($page->ClassName.'_'.$page->LayoutType, $page->ClassName, 'Page'));
    }


	public function HomePageFeatures() {
		$features = HomePageFeature::get();

		return $features;

	}

	public function HomePageHeroFeatures() {
		$features = HomePageHeroFeature::get();

		return $features;

	}


}

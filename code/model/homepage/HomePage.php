<?php
class HomePage extends Page {

	private static $db = array(

	);

	private static $has_one = array(

	);

	private static $has_many = array(
		'BackgroundFeatures' => 'HomePageBackgroundFeature',
	);

	private static $layout_types = array(
		'Legacy' => 'Old style - Shuffled Background Features and Hero Features'
		// 'BackgroundVideo' => 'Background Video',
		// 'ImageSlider' => 'Image Slider'
	);

	public function getPageTypeTheme(){
		if($this->LayoutType == 'Legacy'){
			return "light-header";
		}else{
			return "dark-header";
		}

	}
    public function getOpenGraph_description() {
        return SiteConfig::current_site_config()->Tagline;
    }
	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName('Content');
		$f->removeByName('BackgroundImage');
		$f->removeByName('InheritSidebarItems');
		$f->removeByName('SidebarLabel');
		$f->removeByName('SidebarItem');



		$this->getShuffledBackgroundFields($f);

		// $backgroundVideoFields = $this->getBackgroundVideoFields($f);
		// $imageSliderFields = $this->getImageSliderFields($f);

		// $f->addFieldsToTab('Root.Main', $shuffledBackgroundFields);
		// $f->addFieldsToTab('Root.Main', $backgroundVideoFields);
		// $f->addFieldsToTab('Root.Main', $imageSliderFields);




		//$this->extend('updateCMSFields', $f);



		return $f;
	}


	public function getShuffledBackgroundFields($f){

		$legacyFieldList = new FieldList();
		$fieldList = new FieldList();

		// Legacy fields
		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
		$gridFieldConfig->removeComponentsByType('GridFieldDeleteAction');

		$homePageFeatureGridFieldConfig = GridFieldConfig_RecordEditor::create();
		$homePageFeatureGridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

		$homePageFeatureGridFieldConfig->addComponent(new GridFieldAddNewMultiClass());
		$homePageFeatureGridFieldConfig->removeComponentsByType('GridFieldDeleteAction');
		$homePageFeatureGridFieldConfig->removeComponentsByType('GridFieldAddNewButton')->getComponentByType('GridFieldAddNewMultiClass')->setClasses(
			array(
				'HomePageFeature',
				'HomePageFacebookFeature',
				'HomePageTwitterFeature',
			)
		);

		$bgImagesGridFieldConfig = GridFieldConfig_RelationEditor::create();
		$bgImagesGridFieldConfig->removeComponentsByType('GridFieldAddExistingAutocompleter');
		if (!Permission::check('ADMIN')) {
			$gridFieldConfig->removeComponentsByType('GridFieldAddNewButton');

		}

		$homePageBackgroundFeatureGridField = GridField::create('BackgroundFeatures', 'Background images and taglines', $this->BackgroundFeatures(), $bgImagesGridFieldConfig);
		$homePageHeroFeatureGridField       = GridField::create('HomePageHeroFeature', 'Hero features that overlap the background (Only the first two are shown)', HomePageHeroFeature::get(), $gridFieldConfig);

		$homePageFeatureGridField = GridField::create('HomePageFeature', 'Features below the background image (Only the first three are shown)', HomePageFeature::get(), $homePageFeatureGridFieldConfig);


		$legacyFieldList->push($homePageBackgroundFeatureGridField);
		$legacyFieldList->push(LiteralField::create('SpacerField', '<br /><br />'));
		$legacyFieldList->push($homePageHeroFeatureGridField);
		$legacyFieldList->push($homePageFeatureGridField);



		// Begin Default Slider fields
		$newgridFieldConfig = GridFieldConfig_RecordEditor::create();
		$newgridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
		$newgridFieldConfig->removeComponentsByType('GridFieldDeleteAction');

		$newhomePageFeatureGridFieldConfig = GridFieldConfig_RecordEditor::create();
		$newhomePageFeatureGridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

		$newhomePageFeatureGridFieldConfig->addComponent(new GridFieldAddNewMultiClass());
		$newhomePageFeatureGridFieldConfig->removeComponentsByType('GridFieldDeleteAction');

		$newbgImagesGridFieldConfig = GridFieldConfig_RelationEditor::create();
		$newbgImagesGridFieldConfig->removeComponentsByType('GridFieldAddExistingAutocompleter');
		if (!Permission::check('ADMIN')) {
			$newgridFieldConfig->removeComponentsByType('GridFieldAddNewButton');

		}

		$newHomePageHeroFeatureGridField = GridField::create('NewHomePageHeroFeature', 'Homepage Slides', NewHomePageHeroFeature::get(), $gridFieldConfig);

		$fieldList->push($newHomePageHeroFeatureGridField);




		$f->addFieldToTab('Root.Main', DisplayLogicWrapper::create($legacyFieldList)->displayIf('LayoutType')->isEqualTo('Legacy')->end());
		$f->addFieldToTab('Root.Main', DisplayLogicWrapper::create($fieldList)->displayIf('LayoutType')->isEqualTo(null)->end());

	}

	public function getRandomBackgroundFeature(){
		$bg = $this->BackgroundFeatures()->Sort('RAND()')->First();
		return $bg;
	}
}
class HomePage_Controller extends Page_Controller {

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
		$page = $this->customise(array(
				'BackgroundFeature' => $bg
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

	public function NewHomePageHeroFeatures() {
		$features = NewHomePageHeroFeature::get();

		return $features;

	}

}
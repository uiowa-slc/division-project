<?php
class HomePage extends Page {

	private static $db = array(

	);

	private static $has_one = array(

	);

	private static $has_many = array(
		'BackgroundFeatures' => 'HomePageBackgroundFeature',
	);

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName("Content");
		$f->removeByName("BackgroundImage");
		$f->removeByName("InheritSidebarItems");
		$f->removeByName("SidebarLabel");
		$f->removeByName("SidebarItem");

		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
		$gridFieldConfig->removeComponentsByType('GridFieldDeleteAction');

		$homePageFeatureGridFieldConfig = GridFieldConfig_RecordEditor::create();
		$homePageFeatureGridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

		$homePageFeatureGridFieldConfig->addComponent(new GridFieldAddNewMultiClass());
		$homePageFeatureGridFieldConfig->removeComponentsByType('GridFieldDeleteAction');
		$homePageFeatureGridFieldConfig->removeComponentsByType('GridFieldAddNewButton')->getComponentByType("GridFieldAddNewMultiClass")->setClasses(
			array(
				"HomePageFeature",
				"HomePageFacebookFeature",
				"HomePageTwitterFeature",
			)
		);

		$bgImagesGridFieldConfig = GridFieldConfig_RelationEditor::create();
		$bgImagesGridFieldConfig->removeComponentsByType('GridFieldAddExistingAutocompleter');

		if (!Permission::check('ADMIN')) {
			$gridFieldConfig->removeComponentsByType('GridFieldAddNewButton');
			
		}
		
		$homePageBackgroundFeatureGridField = new GridField('BackgroundFeatures', 'Background images and taglines', $this->BackgroundFeatures(), $bgImagesGridFieldConfig);
		$homePageHeroFeatureGridField       = new GridField("HomePageHeroFeature", "Hero features that overlap the background (Only the first two are shown)", HomePageHeroFeature::get(), $gridFieldConfig);


		$homePageFeatureGridField           = new GridField("HomePageFeature", "Features below the background image (Only the first three are shown)", HomePageFeature::get(), $homePageFeatureGridFieldConfig);

		if (Permission::check('ADMIN')) {
			$f->addFieldToTab("Root.Main", $homePageBackgroundFeatureGridField);
			$f->addFieldToTab("Root.Main", new LiteralField("SpacerField", "<br /><br />"));
		}

		$f->addFieldToTab("Root.Main", $homePageHeroFeatureGridField);
		$f->addFieldToTab("Root.Main", new LiteralField("SpacerField", "<br /><br />"));
		$f->addFieldToTab("Root.Main", $homePageFeatureGridField);
		
		$this->extend('updateCMSFields', $f);
		return $f;
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
		$page = $this->customise(array(
				'BackgroundFeature' => $this->BackgroundFeatures()->Sort('RAND()')->First(),
			));

		return $page->renderWith(array('HomePage', 'Page'));
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
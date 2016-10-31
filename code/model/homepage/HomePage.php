<?php
class HomePage extends Page {

	private static $db = array(
		'LayoutType' => 'varchar(155)'
	);

	private static $has_one = array(

	);

	private static $has_many = array(
		'BackgroundFeatures' => 'HomePageBackgroundFeature',
	);

	protected $layout_types = array(
		'ShuffledBackgroundFeatures' => 'Shuffled Background Features and Hero Features (legacy)',
		'BackgroundVideo' => 'Background Video',
		'ImageSlider' => 'Image Slider'
	);

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName('Content');
		$f->removeByName('BackgroundImage');
		$f->removeByName('InheritSidebarItems');
		$f->removeByName('SidebarLabel');
		$f->removeByName('SidebarItem');


		$layoutOptionsField = DropdownField::create(
  			'LayoutType',
  			'Layout type',
  			$this->layout_types
		);
		$f->addFieldToTab('Root.Main', $layoutOptionsField);


		$this->getShuffledBackgroundFields($f);

		// $backgroundVideoFields = $this->getBackgroundVideoFields($f);
		// $imageSliderFields = $this->getImageSliderFields($f);

		// $f->addFieldsToTab('Root.Main', $shuffledBackgroundFields);
		// $f->addFieldsToTab('Root.Main', $backgroundVideoFields);
		// $f->addFieldsToTab('Root.Main', $imageSliderFields);



		
		$this->extend('updateCMSFields', $f);



		return $f;
	}


	public function getShuffledBackgroundFields($f){

		$fieldList = new FieldList();

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

		
		$fieldList->push($homePageBackgroundFeatureGridField);
		$fieldList->push(LiteralField::create('SpacerField', '<br /><br />'));
		$fieldList->push($homePageHeroFeatureGridField);
		$fieldList->push($homePageFeatureGridField);

		$f->addFieldToTab('Root.Main', DisplayLogicWrapper::create($fieldList)->displayIf('LayoutType')->isEqualTo('ShuffledBackgroundFeatures')->end());
		
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

		return $page->renderWith(array('HomePage_'.$this->LayoutType, 'HomePage', 'Page'));
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
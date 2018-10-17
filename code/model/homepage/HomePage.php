<?php
class HomePage extends Page {

	private static $db = array(
		'ShuffleHomePageFeatures' => 'Boolean'
	);

	private static $has_one = array(

	);

	private static $has_many = array(
		'BackgroundFeatures' => 'HomePageBackgroundFeature',
	);

	private static $layout_types = array(
		'Legacy' => 'Old style - Shuffled Background Features and Hero Features'
	);

	public function getCMSFields() {
		$f = parent::getCMSFields();

		
		$f->removeByName('Content');
		$f->removeByName('BackgroundImage');
		$f->removeByName('InheritSidebarItems');
		$f->removeByName('SidebarLabel');
		$f->removeByName('SidebarItem');


		$f->addFieldToTab('Root.Main', CheckboxField::create('ShowChildrenInDropdown','Show child pages in a dropdown menu if page is in the top bar (Yes)'));
			$layoutOptionsField = DropdownField::create(
	  			'LayoutType',
	  			'Layout type',
	  			$this->LayoutTypes()
			)->setEmptyString('(Default Layout)');

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

		$legacyFieldList = new FieldList();
		$fieldList = new FieldList();

		// Legacy fields

		//Legacy HomePageHeroFeatureGridFieldConfig
		$homePageHeroFeatureGridFieldConfig = GridFieldConfig_RecordEditor::create();

		$homePageHeroFeatureGridFieldConfig->addComponent($sortable = new GridFieldSortableRows('SortOrder'));
		$sortable->setUpdateVersionedStage('Live');

		$homePageHeroFeatureGridFieldConfig->removeComponentsByType('GridFieldDetailForm');
		$homePageHeroFeatureGridFieldConfig->addComponent(new Heyday\VersionedDataObjects\VersionedDataObjectDetailsForm());

		//Legacy Homepage Features:
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

		//Legacy Background Image Field:
		$bgImagesGridFieldConfig = GridFieldConfig_RelationEditor::create();
		$bgImagesGridFieldConfig->removeComponentsByType('GridFieldAddExistingAutocompleter');
		if (!Permission::check('ADMIN')) {
			$homePageHeroFeatureGridFieldConfig->removeComponentsByType('GridFieldAddNewButton');

		}

		$homePageBackgroundFeatureGridField = GridField::create('BackgroundFeatures', 'Background images and taglines', $this->BackgroundFeatures(), $bgImagesGridFieldConfig);
		$homePageHeroFeatureGridField       = GridField::create('HomePageHeroFeature', 'Hero features that overlap the background (Only the first two are shown)', HomePageHeroFeature::get(), $homePageHeroFeatureGridFieldConfig);

		$homePageFeatureGridField = GridField::create('HomePageFeature', 'Features below the background image (Only the first three are shown)', HomePageFeature::get(), $homePageFeatureGridFieldConfig);


		$legacyFieldList->push($homePageBackgroundFeatureGridField);
		$legacyFieldList->push(LiteralField::create('SpacerField', '<br /><br />'));
		$legacyFieldList->push($homePageHeroFeatureGridField);
		$legacyFieldList->push($homePageFeatureGridField);

		//New, non-legacy slides:

		// Begin Default Slider fields
		$newgridFieldConfig = GridFieldConfig_RecordEditor::create();
		$newgridFieldConfig->addComponent($newSortable = new GridFieldSortableRows('SortOrder'));

		$newSortable->setUpdateVersionedStage('Live');
		
		$newgridFieldConfig->removeComponentsByType('GridFieldDeleteAction');
		$newgridFieldConfig->removeComponentsByType('GridFieldAddExistingAutocompleter');
	
		if (!Permission::check('ADMIN')) {
			$newgridFieldConfig->removeComponentsByType('GridFieldAddNewButton');

		}

		$newHomePageHeroFeatureGridField = GridField::create('NewHomePageHeroFeature', 'Homepage Slides', NewHomePageHeroFeature::get(), $newgridFieldConfig);
		$shuffleHomePageFeaturesField = CheckboxField::create('ShuffleHomePageFeatures', 'Show features in a random order');

		$fieldList->push($shuffleHomePageFeaturesField);
		$fieldList->push($newHomePageHeroFeatureGridField);

		$f->addFieldToTab('Root.Main', DisplayLogicWrapper::create($legacyFieldList)->displayIf('LayoutType')->isEqualTo('Legacy')->end());

		$f->addFieldsToTab('Root.Main', DisplayLogicWrapper::create($fieldList)->displayIf('LayoutType')->isEqualTo('')->end());

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
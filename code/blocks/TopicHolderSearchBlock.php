<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Control\Controller;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;

class TopicHolderSearchBlock extends BaseElement {

	private static $db = array(

	);

	private static $has_one = array(
		'TopicHolder' => 'TopicHolder',
		'BackgroundImage' => Image::class,

	);
	private static $many_many = array(

	);

	private static $controller_class = TopicHolderSearchBlockController::class;

	private static $table_name = 'TopicHolderSearchBlock';

	public function getType() {
		return 'Topic Holder Search Block';
	}

	public function getCMSFields() {
		$this->beforeUpdateCMSFields(function (FieldList $fields) {

			$field = DropdownField::create('TopicHolderID', 'Select a Topic Holder:', TopicHolder::get()->map('ID', 'Title'));
			$fields->addFieldToTab('Root.Main', $field);
			$fields->addFieldToTab("Root.Main", new UploadField("BackgroundImage", "Background Image"));
		});

		return parent::getCMSFields();
	}

	public function TopicSearchForm() {
		//$current = Controller::curr();
		$controller = TopicHolderController::create($this);
		$current = $this->getController();

		$topicHolder = $this->TopicHolder();

		$controller->setRequest($current->getRequest());
		//print_r($this->getController());
		$form = $controller->TopicSearchForm();

		$form->setFormAction(
			Controller::join_links(
				$topicHolder->Link(),
				'TopicSearchForm'
			)
		);
		return $form;
	}

}

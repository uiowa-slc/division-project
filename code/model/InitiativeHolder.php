<?php

use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use MD\DivisionProject\InitiativeHolderController;
class InitiativeHolder extends Page {

	private static $db = array(
		'ShuffleInitiatives' => 'Boolean'
	);
	private static $has_one = array(
		'FeaturedInitiative' => 'InitiativePage'
	);
	private static $allowed_children = array('InitiativePage');
	
		public function getCMSFields()	{

			$fields = parent::getCMSFields();
			$fields->addFieldToTab('Root.Main', new CheckboxField('ShuffleInitiatives', 'Show initiatives in a random order'), 'Content');
			$initiatives = InitiativePage::get()->filter(array('ParentID' => $this->ID));
			$featuredInitiativeField = DropdownField::create(
										   $name = "FeaturedInitiativeID",
										   $title = "Choose a featured initative (this will  change the image used for the initiatives homepage feature and all initiative sidebar items)",
										   $source = $initiatives->map()->toArray()
										)->setEmptyString('No featured initiative');

			//new TreeDropdownField("FeaturedInitiative", "Choose a featured initiative", "InitiativePage");
			//$featuredInitiativeField->setConfig("showcalendar", true);

			
			$fields->addFieldToTab("Root.Main",$featuredInitiativeField, "Content");
			
			return $fields;

		}


}
	

?>
<?php
class InitiativeHolder extends Page {

	private static $db = array();
	private static $has_one = array(
		'FeaturedInitiative' => 'InitiativePage'
	);
	private static $allowed_children = array('InitiativePage');
	
		public function getCMSFields()	{

			$fields = parent::getCMSFields();

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
	
class InitiativeHolder_Controller extends Page_Controller {

	//public static $allowed_actions = array ( "legislation" );
	
	public function init() {
		parent::init();
	}

	public function Initiatives(){

		

		if($this->FeaturedInitiativeID){
			$featuredInitiativeID = $this->FeaturedInitiativeID;
			$initiatives = InitiativePage::get()->exclude(array(
				'ID' => $featuredInitiativeID
			))->filter(array('ParentID' => $this->ID))->sort('RAND()');
			

		}else{
			$initiatives = InitiativePage::get()->filter(array('ParentID' => $this->ID))->sort('RAND()');
		}
		return $initiatives;
	}
}

?>
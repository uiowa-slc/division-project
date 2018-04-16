<?php
class InitiativeHolderController extends PageController {

	//private static $allowed_actions = array ( "legislation" );
	
	public function init() {
		parent::init();
	}

	public function Initiatives(){

		

		if($this->FeaturedInitiativeID){
			$featuredInitiativeID = $this->FeaturedInitiativeID;

			if($this->ShuffleInitiatives){
				$initiatives = InitiativePage::get()->exclude(array(
					'ID' => $featuredInitiativeID
				))->filter(array('ParentID' => $this->ID))->sort('RAND()');

			}else{
				$initiatives = InitiativePage::get()->exclude(array(
					'ID' => $featuredInitiativeID
				))->filter(array('ParentID' => $this->ID))->sort('Sort');
			}

			

		}else{

			if($this->ShuffleInitiatives){
				$initiatives = InitiativePage::get()->filter(array('ParentID' => $this->ID))->sort('RAND()');

			}else{
				$initiatives = InitiativePage::get()->filter(array('ParentID' => $this->ID))->sort('Sort');
			}
		}
		return $initiatives;
	}
}

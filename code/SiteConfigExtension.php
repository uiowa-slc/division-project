<?php

class SiteConfigExtension extends DataExtension {

  static $db = array(
	'TwitterID' => 'Text',
	'Address' =>'Text',
	'PhoneNumber' =>'Text',
	'FacebookID' =>'Text',
	'GroupSummary'=>'Text',
    
	);

  static $has_one = array(
    
  );
  
  public function updateCMSFields(FieldList $fields){
	  
	  $fields->addFieldToTab('Root.Main', new TextField('TwitterID', 'Twitter Account URL'));
	  $fields->addFieldToTab('Root.Main', new TextField('Address', 'Organization Address'));
	  $fields->addFieldToTab('Root.Main', new TextField('PhoneNumber', 'Phone Number'));
	  $fields->addFieldToTab('Root.Main', new TextField('FacebookID', 'Facebook Account URl'));
	  $fields->addFieldToTab('Root.Main', new TextField('GroupSummary', 'Group Summary'));
	  
	  return $fields;
  }

}
class SiteConfigExtensionPage_Controller extends Page_Controller {
	

   public function init() { 
      parent::init(); 
   }    
    
}
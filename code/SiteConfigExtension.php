<?php

class SiteConfigExtension extends DataExtension {

  static $db = array(
	'TwitterLink' => 'Text',
	'Address' =>'Text',
	'PhoneNumber' =>'Text',
	'FacebookLink' =>'Text',
	'GroupSummary'=>'Text',
    
	);

  static $has_one = array(
    
  );
  
  public function updateCMSFields(FieldList $fields){
	  
	  $fields->addFieldToTab('Root.Main', new TextField('TwitterLink', 'Twitter Account URL'));
	  $fields->addFieldToTab('Root.Main', new TextField('FacebookLink', 'Facebook Account URL'));
	  $fields->addFieldToTab('Root.Main', new TextareaField('Address', 'Organization Address'));
	  $fields->addFieldToTab('Root.Main', new TextareaField('PhoneNumber', 'Phone Number(s)'));
	  $fields->addFieldToTab('Root.Main', new TextareaField('GroupSummary', 'Group Summary'));
	  
	  return $fields;
  }

}
class SiteConfigExtensionPage_Controller extends Page_Controller {
	

   public function init() { 
      parent::init(); 
   }    
    
}
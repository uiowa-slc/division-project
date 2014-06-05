<?php

class SiteConfigExtension extends DataExtension {

  static $db = array(
	'TwitterLink' => 'Text',
	'Address' =>'Text',
	'PhoneNumber' =>'Text',
	'FacebookLink' =>'Text',
	'GroupSummary'=>'HTMLText',
	'EmailAddress' => 'Text'
    
	);

  static $has_one = array(
    
  );
  
  public function updateCMSFields(FieldList $fields){

	  $fields->addFieldToTab('Root.Main', new HTMLEditorField('GroupSummary', 'Group Summary'));

	  $fields->addFieldToTab('Root.Main', new TextareaField('Address', 'Organization Address'));
	  $fields->addFieldToTab('Root.Main', new TextareaField('PhoneNumber', 'Phone Number(s)'));
	  $fields->addFieldToTab('Root.Main', new TextareaField('EmailAddress', 'Email Address'));

	  $fields->addFieldToTab('Root.Main', new TextField('TwitterLink', 'Twitter Account URL'));
	  $fields->addFieldToTab('Root.Main', new TextField('FacebookLink', 'Facebook Account URL'));

	  
	  return $fields;
  }

}
class SiteConfigExtensionPage_Controller extends Page_Controller {
	

   public function init() { 
      parent::init(); 
   }    
    
}
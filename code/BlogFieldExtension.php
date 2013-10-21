<?php



class BlogFieldExtension extends DataExtension {

	static $db = array(
     	'StoryBy' => 'Text',
        'StoryByEmail' => 'Text',
        'StoryByTitle' => 'Text',
        'StoryByDept' => 'Text',
        'PhotosBy' => 'Text',
        'PhotosByEmail' => 'Text',
        'ExternalURL' => 'Text',	
	
	);

    static $has_one = array(
        'Image' => 'Image',
  
    );
    
    public function getCMSFields() {
      $this->extend('updateCMSFields', $fields);
      
      return $fields;
    }


    public function updateCMSFields(FieldList $fields) {
      $fields->addFieldToTab("Root.Main", new UploadField('Image', 'Main Image'), 'Content');
      $fields->addFieldToTab("Root.Main", new TextField('StoryBy', 'Story author'), 'Content');
      $fields->addFieldToTab("Root.Main", new TextField('StoryByEmail', 'Author email address'), 'Content');
      $fields->addFieldToTab("Root.Main", new TextField('StoryByTitle', 'Author posiiton title'), 'Content');
      $fields->addFieldToTab("Root.Main", new TextField('StoryByDept', 'Author department title'), 'Content');$fields->addFieldToTab("Root.Main", new TextField('PhotosBy', 'Photos or video by'), 'Content');
      $fields->addFieldToTab("Root.Main", new TextField('PhotosByEmail', 'Photographer email address'), 'Content');
      $fields->addFieldToTab("Root.Main", new TextField('ExternalURL', 'External URL (if story lives elsewhere)'), 'Content');
      $fields->removeByName("Author");
	  
      if($this->owner->ClassName == "BlogEntry"){
        //$fields->removeByName("Date");
      }else {

        $fields->renameField("Date", "Published Date");
      }

  }



}
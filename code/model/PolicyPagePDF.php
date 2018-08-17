<?php
class PolicyPagePDF extends Page {

	private static $has_one = [
        'PDF' => 'File',
    ];

	private static $singular_name = 'PDFPage';

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName("StoryBy");
		$f->removeByName("StoryByEmail");
		$f->removeByName("StoryByTitle");
		$f->removeByName("StoryByDept");
		$f->removeByName("PhotosBy");
		$f->removeByName("PhotosByEmail");
		$f->removeByName("Image");
		$f->removeByName("BackgroundImage");
		$f->removeByName("Content");
		$f->removeByName("LayoutType");
         // $fields->addFieldToTab('Root.Attachments', UploadField::create('Brochure','Travel brochure, optional (PDF only)'));

		$f->addFieldToTab('Root.Main', new UploadField('PDF', 'Add a file'));
		return $f;
	}
	
}
class PolicyPagePDF_Controller extends Page_Controller {

	

}
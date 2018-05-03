<?php
class CommunicationBlank extends Page {

	private static $db = array(
		'EmailBody' => 'Text'
	);

	private static $has_one = array(

	);

	private static $has_many = array(
	
	);
	private static $can_be_root = false;
	private static $layout_types = array(
	
	);

	private static $allowed_children = array('CommunicationBlank', 'Communication');

	public function getCMSFields() {
		$f = parent::getCMSFields();
		
		$f->removeByName('Content');
		$f->removeByName('LayoutType');
		$f->removeByName('BackgroundImage');
		$f->addFieldToTab('Root.Main', $codeField = CodeeditorField::create('EmailBody', 'Full Email HTML here'));
		$codeField->addExtraClass('stacked');
		// set the height of the field (defaults to 8)
		$codeField->setRows(30);
		return $f;
	}

	public function EmailBodyFiltered(){
		$content = $this->EmailBody;
		$contentFiltered = str_replace('*|MC:SUBJECT|*', $this->Title, $content);
		$contentFiltered = str_replace('*|MC:PREVIEW_TEXT|*', '', $contentFiltered);
		return $contentFiltered;
	}


	
}
class CommunicationBlank_Controller extends Page_Controller {

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
	

	public function init() {
		parent::init();

	}
	

}
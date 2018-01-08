<?php
class PolicyHolder extends Page {

	private static $db = array(
		"Policies"   => "HTMLText",
		"PolicyYear" => "Text",
	);

	private static $has_one = array(

	);

	private static $has_many = array(
	);

	private static $singular_name = 'Policy Holder';

	private static $plural_name = 'Policy Holders';

	private static $allowed_children = array("PolicyPage");
	public function Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = true){
		return parent::Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = true);
	}	
	public function getCMSFields() {
		$f = parent::getCMSFields();
		//$f->removeByName("Content");
		//$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		//$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

		/*$gridField = new GridField("StaffTeam", "Staff Teams", StaffTeam::get(), GridFieldConfig_RecordEditor::create());
		$f->addFieldToTab("Root.Main", $gridField); // add the grid field to a tab in the CMS	*/
		$f->addFieldToTab("Root.Main", new TextField("PolicyYear", "Archive Policy Year (Only fill out if these policies are archived)"), "Content");
		$f->addFieldToTab("Root.Main", new HTMLEditorField("Policies", "Policies"));
		return $f;
	}
}
class PolicyHolder_Controller extends Page_Controller {

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
	private static $allowed_actions = array(
		'printable'
	);

	private static $url_handlers = array(
		'printable' => 'printable'
	);

	public function init() {
		parent::init();
	}

	

	public function PrintablePages(){

		
		$policies = $this->obj('Policies')->getValue();
		//$xml = simplexml_load_string($policies);

		$xml = new DOMDocument();
		$xml->loadHTML($policies); 
		$anchors = array();
		$pages = new ArrayList();
		//$results = $xml->xpath('//a');
		$results = $xml->getElementsByTagName( "a" );
		$parser = ShortcodeParser::get('default');
		//print_r($xml);
		foreach($results as $result){
			$resultTrimmed = trim($result->getAttribute('href'));
			$resultValueTrimmed = trim($result->nodeValue);
			$resultValueTrimmed = mb_convert_encoding($resultValueTrimmed, 'UTF-8');
			if(($resultTrimmed != '') && ( $resultValueTrimmed != '')){
				$parsedResult = $parser->parse($resultTrimmed);
				$anchors[] = $parsedResult;
				if($siteTree = SiteTree::get_by_link($parsedResult)){
					$pages->push($siteTree);
					//print_r($siteTree->Title.'is a page..<br />');
				}else{

					if(!strpos($parsedResult,'http')){
						$parsedResult = Director::absoluteURL($parsedResult);
					}
					$tempPage = new Page();
					$tempPage->Title = $resultValueTrimmed;
					$tempPage->CanonicalLink = $parsedResult;
					$pages->push($tempPage);
				}
				
			}
			
		
		}
		return $pages;
	}

	public function printable(){
		return $this->renderWith(array('PolicyHolder_print', 'Page'));
	}

}
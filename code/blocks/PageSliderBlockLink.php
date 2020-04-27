<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\TagField\TagField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\CMS\Model\SiteTree;
use UncleCheese\DisplayLogic\Forms\Wrapper;
use SilverStripe\Assets\Image;

class PageSliderBlockLink extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(155)',
		'Content' => 'HTMLText',
		'Source' => 'Enum(array("internal","external")',
		'ExternalLink' => 'Text'
	);

	private static $belongs_many_many = array(
		'PageSliderBlocks' => 'PageSliderBlock'
	);

	private static $has_one = array(
		'Page' => SiteTree::class,
		'BackgroundImage' => Image::class
	);


	public function getCMSFields(){
		$fields = FieldList::create();
		$fields->push(TextField::create('Title', 'Title (default: uses selected page\'s title if the page is on this site.)'));

		$fields->push(
			OptionsetField::create('Source', 'Link to:',array(
                'internal' => 'A page on this site',
                'external' => 'An external link')));
		
		$fields->push(Wrapper::create(TextField::create('ExternalLink', 'Link'))->displayIf('Source')->isEqualTo('external')->end());
		$fields->push(Wrapper::create(TreeDropdownField::create('PageID', 'Page', SiteTree::class))->displayIf('Source')->isEqualTo('internal')->end());

		// $fields->push(HTMLEditorField::create('Content', 'Summary')->setRows(3));
		$fields->push(UploadField::create('BackgroundImage', 'Background Image (default uses selected page\'s background image if the page is on this site.)'));




		return $fields;

	}

	public function Link(){
		if($this->Source == "external"){
			return $this->ExternalLink;
		}elseif($this->PageID) {
			return $this->Page()->Link();
		}
	}

	protected function onBeforeWrite(){
		$link = $this->URL;

		if($link != ''){
			 if( $ret = parse_url($link)) {
			  if(!isset($ret["scheme"])){
			   	$parsedLink = "http://{$link}";
			   	$this->URL = $parsedLink;
			   }
			}
		}

		parent::onBeforeWrite();
	}

}

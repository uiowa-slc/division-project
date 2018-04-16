<?php
namespace DNADesign\Elemental\Models;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use DNADesign\Elemental\Models\BaseElement;


class FeaturedPageBlock extends BaseElement{

	private static $db = array(
		'FeaturePageSummary' => 'HTMLText',
		'UseBackground' => 'Boolean',
		'FeaturePageExternalUrl' => 'Text',
		'Source' => "Enum('Internal,External')"
	);

	private static $has_one = array(
		'PageTree' => SiteTree::class,
		'FeaturePagePhoto' => Image::class
	);
	private static $table_name = 'FeaturedPageBlock';  

	public function getType()
    {
        return 'Featured Page Block';
    }

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('PageTreeID');
		$fields->removeByName('FeaturePageExternalUrl');
		
		$fields->addFieldToTab('Root.Main', DropdownField::create(
		  'Source',
		  'Page source',
		  array(
		  	'Internal' => 'Page on this site',
		  	'External' => 'Another website or external page'
		  )
		));

		$internalFields = DisplayLogicWrapper::create(
			TreeDropdownField::create('PageTreeID', 'Select a Page:', SiteTree::class),
			HeaderField::create( '<br><hr><br><h3>Overwrite Page Settings</h3>', '3', true )
		)->displayIf('Source')->isEqualTo('Internal')->end();

		$externalFields = DisplayLogicWrapper::create(
			TextField::create('FeaturePageExternalUrl', 'Use external website URL')
		)->displayIf('Source')->isEqualTo('External')->end();


		$fields->addFieldsToTab('Root.Main', $internalFields);
		$fields->addFieldsToTab('Root.Main', $externalFields);
		$fields->addFieldToTab('Root.Main', new CheckboxField('UseBackground','Use image as background'));
		$fields->addFieldToTab('Root.Main', new UploadField('FeaturePagePhoto', 'Add an image'));

		$fields->addFieldToTab('Root.Main', $myEditorField = new HTMLEditorField('FeaturePageSummary', 'Summary Text'));
		$myEditorField->setRows(12);

		return $fields;
	}

}
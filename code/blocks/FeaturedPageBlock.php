<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use UncleCheese\DisplayLogic\Forms\Wrapper;

class FeaturedPageBlock extends BaseElement {

	private static $db = array(
		'FeaturePageSummary' => 'HTMLText',
		'UseBackground' => 'Boolean',
		'FeaturePageExternalUrl' => 'Text',
		'Source' => "Enum('Internal,External')",
	);

	private static $has_one = array(
		'PageTree' => SiteTree::class,
		'FeaturePagePhoto' => Image::class,
	);
	private static $table_name = 'FeaturedPageBlock';

	private static $owns = array('FeaturePagePhoto');

	public function getType() {
		return 'Featured Page Block';
	}

	public function getCMSFields() {
		$this->beforeUpdateCMSFields(function (FieldList $fields) {
			$fields->removeByName('PageTreeID');
			$fields->removeByName('FeaturePageExternalUrl');

			$fields->addFieldToTab('Root.Main', DropdownField::create(
				'Source',
				'Page source',
				array(
					'Internal' => 'Page on this site',
					'External' => 'Another website or external page',
				)
			));

			$internalFields = Wrapper::create(
				TreeDropdownField::create('PageTreeID', 'Select a Page:', SiteTree::class),
				HeaderField::create('OverwritePageSettingsHeader', 'Overwrite Page Settings', 3)
			)->displayIf('Source')->isEqualTo('Internal')->end();

			$externalFields = Wrapper::create(
				TextField::create('FeaturePageExternalUrl', 'Use external website URL')
			)->displayIf('Source')->isEqualTo('External')->end();

			$fields->addFieldsToTab('Root.Main', $internalFields);
			$fields->addFieldsToTab('Root.Main', $externalFields);
			$fields->addFieldToTab('Root.Main', new CheckboxField('UseBackground', 'Use image as background'));
			$fields->addFieldToTab('Root.Main', new UploadField('FeaturePagePhoto', 'Add an image'));

			$fields->addFieldToTab('Root.Main', $myEditorField = new HTMLEditorField('FeaturePageSummary', 'Summary Text'));
			$myEditorField->setRows(12);

		});

		return parent::getCMSFields();
	}

}

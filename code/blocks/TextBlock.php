<?php

use DNADesign\Elemental\Models\ElementContent;
use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\FieldList;

class TextBlock extends ElementContent {

	private static $db = array(
		//Content field is for legacy/migration purposes only. Use HTML in ElementContent after migration.
		'Content' => 'HTMLText',
		'ExternalLink' => 'Varchar(155)',
	);

	private static $has_one = array(
		'Image' => Image::class,
		'LinkedPage' => SiteTree::class,
	);

	private static $owns = array(
		'Image',
	);

	/**
	 * If the singular name is set in a private static $singular_name, it cannot be changed using the translation files
	 * for some reason. Fix it by defining a method that handles the translation.
	 * @return string
	 */
	public function singular_name() {
		return _t('TextBlock.SINGULARNAME', 'Text+Image Block');
	}
	private static $table_name = 'TextBlock';

	public function getType() {
		return 'Text Block';
	}

	/**
	 * If the plural name is set in a private static $plural_name, it cannot be changed using the translation files
	 * for some reason. Fix it by defining a method that handles the translation.
	 * @return string
	 */
	public function plural_name() {
		return _t('TextBlock.PLURALNAME', 'Text+Image Blocks');
	}

	public function getCMSFields() {
		$this->beforeUpdateCMSFields(function (FieldList $fields) {

			$fields->removeByName('LinkedPageID');
			$fields->removeByName('Content');
			$fields->renameField('ExternalLink', 'Link (include http://)');
		});

		return parent::getCMSFields();

	}
}

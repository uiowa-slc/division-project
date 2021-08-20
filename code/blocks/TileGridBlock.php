<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\TreeMultiselectField;
use UncleCheese\DisplayLogic\Forms\Wrapper;

class TileGridBlock extends BaseElement {

	private static $db = array(
		'Source' => 'Enum(array("children","manual")',
		// 'MaxSize' => 'Enum(array("4x4","3x3","2x2")',

	);
	private static $has_one = array(
		'Holder' => SiteTree::class,
	);

	private static $many_many = array(
		'CustomPages' => 'Page',
	);

	private static $table_name = 'TileGridBlock';

	public function getType() {
		return 'Tile Grid Block';
	}

	public function getCMSFields() {
		$this->beforeUpdateCMSFields(function (FieldList $fields) {

			$fields->removeByName('HolderID');
			$fields->removeByName('CustomPages');

			$fields->addFieldsToTab('Root.Main', array(

				// DropdownField::create(
				//   'MaxSize',
				//   'Maximum tile grid size on large displays',
				//   singleton('TileGridBlock')->dbObject('MaxSize')->enumValues()
				// ),
				OptionsetField::create('Source', 'Show tiles from:', array(
					'children' => 'A selected page\'s children',
					'manual' => 'Manually selected pages',
				)),

				Wrapper::create(TreeDropdownField::create('HolderID', "Selected page's children:", SiteTree::class))->displayIf('Source')->isEqualTo('children')->end(),
				Wrapper::create(TreeMultiselectField::create('CustomPages', 'Manually selected pages', SiteTree::class))->displayIf('Source')->isEqualTo('manual')->end(),
			));

		});

		return parent::getCMSFields();

	}

}

<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\TreeMultiselectField;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\OptionsetField;
use UncleCheese\DisplayLogic\Forms\Wrapper;
use SilverStripe\Forms\DropdownField;

class TileGridBlock extends BaseElement{

	private static $db = array(
		'Source' => 'Enum(array("children","manual")',
		// 'MaxSize' => 'Enum(array("4x4","3x3","2x2")',

	);
	private static $has_one = array(
		'Holder' => SiteTree::class,
	);

	private static $many_many = array(
		'CustomPages' => 'Page'
	);

    private static $table_name = 'TileGridBlock';

    public function getType()
    {
        return 'Tile Grid Block';
    }

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName('HolderID');
		$f->removeByName('CustomPages');

		$f->addFieldsToTab('Root.Main', array(

			// DropdownField::create(
			//   'MaxSize',
			//   'Maximum tile grid size on large displays',
			//   singleton('TileGridBlock')->dbObject('MaxSize')->enumValues()
			// ),
			OptionsetField::create('Source', 'Show tiles from:',array(
                'children' => 'A selected page\'s children',
                'manual' => 'Manually selected pages',
            )),

			 Wrapper::create(TreeDropdownField::create('HolderID', "Selected page's children:", SiteTree::class))->displayIf('Source')->isEqualTo('children')->end(),
			Wrapper::create(TreeMultiselectField::create('CustomPages', 'Manually selected pages', SiteTree::class))->displayIf('Source')->isEqualTo('manual')->end()
		));



		return $f;

	}


}

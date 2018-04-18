<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\TreeMultiselectField;
use DNADesign\Elemental\Models\BaseElement;


class TileGridBlock extends BaseElement{

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
		$f->renameField('Title', 'Block title');
		$f->addFieldToTab('Root.Main', new TreeDropdownField('HolderID', "Show the following page's children:", SiteTree::class));
		$f->addFieldToTab('Root.Main', new TreeMultiselectField('CustomPages', 'Or Show The Following Pages:', "Page"));  

		return $f;

	}
	

}
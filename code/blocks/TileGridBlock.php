<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\TreeMultiselectField;
use SheaDawson\Blocks\Model\Block;


class TileGridBlock extends Block{

	private static $db = array(
		'Source' => 'Varchar(155)'
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
		$f->renameField('Title', 'Block title');

		$f->addFieldToTab('Root.Main', new TreeDropdownField('HolderID', "Show the following page's children:", SiteTree::class));
		$f->addFieldToTab('Root.Main', new TreeMultiselectField('CustomPages', 'Or Show The Following Pages:', "Page"));  


		$f->removeByName('CustomPages');

		$f->addFieldsToTab('Root.Main', array(
			OptionsetField::create('Source', 'Show tiles from:',array(
                'children' => 'A selected page\'s children',
                'manual' => 'Manually selected pages',
            )),

			$treeDropdown = TreeDropdownField::create('HolderID', "Selected page's children:", "SiteTree"),
			$customPagesSelect = TreeMultiselectField::create('CustomPages', 'Manually selected pages', 'SiteTree')
		));

		
		// $treeDropdown->displayIf('Source')->isEqualTo('children');
		// $customPagesSelect->displayIf('Source')->isEqualTo('manual');

		$f->addFieldToTab('Root.Main', $treeDropdown);
		$f->addFieldToTab('Root.Main', $customPagesSelect); 


		return $f;

	}
	

}
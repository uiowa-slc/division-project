<?php

class TileGridBlock extends Block{

	private static $db = array(
		'Source' => 'Varchar(155)'
	);
	private static $has_one = array(
		'Holder' => 'SiteTree',
	);

	private static $many_many = array(
		'CustomPages' => 'Page'
	);



	public function getCMSFields() {
		$f = parent::getCMSFields();
		$f->renameField('Title', 'Block title');

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
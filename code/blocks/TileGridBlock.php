<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\TreeMultiselectField;

class TileGridBlock extends Block{

	private static $has_one = array(
		'Holder' => SiteTree::class,
	);

	private static $many_many = array(
		'CustomPages' => 'Page'
	);



	public function getCMSFields() {
		$f = parent::getCMSFields();
		$f->renameField('Title', 'Block title');
		$f->addFieldToTab('Root.Main', new TreeDropdownField('HolderID', "Show the following page's children:", SiteTree::class));
		$f->addFieldToTab('Root.Main', new TreeMultiselectField('CustomPages', 'Or Show The Following Pages:', "Page"));  

		return $f;

	}
	

}
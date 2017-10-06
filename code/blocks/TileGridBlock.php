<?php

class TileGridBlock extends Block{
	private static $db = array(
		'ShowTitle' => 'Boolean'
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
		$f->addFieldToTab('Root.Main', new CheckboxField('ShowTitle', 'Show title in block'), 'Title');

		$f->addFieldToTab('Root.Main', new TreeDropdownField('HolderID', "Show the following page's children:", "SiteTree"));
		$f->addFieldToTab('Root.Main', new TreeMultiselectField('CustomPages', 'Or Show The Following Pages:', "Page"));  

		return $f;

	}
	

}
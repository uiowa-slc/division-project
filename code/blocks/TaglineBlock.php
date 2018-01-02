<?php

use SilverStripe\Forms\TextField;

class TaglineBlock extends Block{
	
	private static $db = array(
		'Heading' => 'Varchar(155)',
		'TaglineAlt' => 'HTMLText'
	);

	private static $defaults = array(
		'Heading' => 'Our mission and vision'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->renameField('Title', 'Block name');

		$fields->addFieldToTab('Root.Main', TextField::create('Heading', 'Heading (default: "Our mission and vision", can be left empty)'));
		$fields->addFieldToTab('Root.Main', TextField::create('TaglineAlt', 'Alternate tagline (overrides the default "Site Tagline/Slogan" field <a href="admin/settings">in the site\'s settings</a>)'));
		return $fields;
	}

}
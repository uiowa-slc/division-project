<?php

use SilverStripe\Forms\TextField;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\FieldList;
class TaglineBlock extends BaseElement{
	
	private static $db = array(
		'Heading' => 'Varchar(155)',
		'TaglineAlt' => 'HTMLText'
	);

	private static $defaults = array(
		'Heading' => 'Our mission and vision'
	);
	private static $table_name = 'TaglineBlock';

	public function getType()
    {
        return 'Tagline Block';
    }

	public function getCMSFields() {
		$this->beforeUpdateCMSFields(function (FieldList $fields) {
		$fields->renameField('Title', 'Block name');

		$fields->addFieldToTab('Root.Main', TextField::create('Heading', 'Heading (default: "Our mission and vision", can be left empty)'));
		$fields->addFieldToTab('Root.Main', TextField::create('TaglineAlt', 'Alternate tagline (overrides the default "Site Tagline/Slogan" field <a href="admin/settings">in the site\'s settings</a>)'));
        });

        return parent::getCMSFields();
	}

}

<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\TreeMultiselectField;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\OptionsetField;
use UncleCheese\DisplayLogic\Forms\Wrapper;
use SilverStripe\Forms\DropdownField;

class PageSliderBlock extends BaseElement{

	private static $db = array(


	);
	private static $has_one = array(
		'Holder' => SiteTree::class,
	);

	private static $many_many = array(
		'PageSliderBlockLinks' => 'PageSliderBlockLink'
	);

    private static $table_name = 'PageSliderBlock';

    public function getType()
    {
        return 'Page Slider Block';
    }

	public function getCMSFields() {
		$f = parent::getCMSFields();

		$f->removeByName('HolderID');


		return $f;

	}


}

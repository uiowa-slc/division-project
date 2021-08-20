<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use UncleCheese\DisplayLogic\Forms\Wrapper;

class HeroButtonsBlock extends BaseElement {

    private static $db = array(
        'Size' => 'Varchar(255)',
        'Position' => 'Varchar(255)'
    );

    private static $has_one = array(
        'FeaturedPageOne' => SiteTree::class,
        'FeaturedPageTwo' => SiteTree::class,
        'FeaturedPageThree' => SiteTree::class,
        'FeaturedPageFour' => SiteTree::class,
        'FeaturedPageFive' => SiteTree::class,
        'Image' => Image::class
    );
    private static $table_name = 'HeroButtonsBlock';

    private static $owns = array('Image');

    public function getType() {
        return 'Hero Buttons Block';
    }

    public function getCMSFields() {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {

        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create('Size', 'Size')
                ->setSource(
                    array(
                        'medium' => 'Medium',
                        'small' => 'Small',
                        'large' => 'Large',
                    )
                )->setValue('medium')
        );
        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create('Position', 'Content Position')
                ->setSource(
                    array(
                        'center' => 'Centered',
                        'bottomleft' => 'Bottom Left',
                    )
                )->setValue('center')
        );
        $fields->addFieldToTab('Root.Main', TreeDropdownField::create('FeaturedPageOneID', 'Link to this page', SiteTree::class), 'Content');

        $fields->addFieldToTab('Root.Main', TreeDropdownField::create('FeaturedPageTwoID', 'Link to this page', SiteTree::class), 'Content');
        $fields->addFieldToTab('Root.Main', TreeDropdownField::create('FeaturedPageThreeID', 'Link to this page', SiteTree::class), 'Content');
        $fields->addFieldToTab('Root.Main', TreeDropdownField::create('FeaturedPageFourID', 'Link to this page', SiteTree::class), 'Content');
        $fields->addFieldToTab('Root.Main', TreeDropdownField::create('FeaturedPageFiveID', 'Link to this page', SiteTree::class), 'Content');
        });

        return parent::getCMSFields();
    }

}

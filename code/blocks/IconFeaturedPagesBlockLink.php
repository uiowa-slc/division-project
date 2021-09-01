<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\ORM\DataObject;
use UncleCheese\DisplayLogic\Forms\Wrapper;

class IconFeaturedPagesBlockLink extends DataObject {

    private static $db = array(
        'Title' => 'Varchar(155)',
        'Content' => 'HTMLText',
        'Source' => 'Enum(array("internal","external")',
        'ExternalLink' => 'Text',
        'LinkText' => 'Text',
        'Summary' => 'Text'
    );

    private static $belongs_many_many = array(
        'PageSliderBlocks' => 'PageSliderBlock',
    );

    private static $has_one = array(
        'Page' => SiteTree::class,
        'Icon' => Image::class,
    );

    public function getCMSFields() {
        $fields = new FieldList();


        $fields->push(
            OptionsetField::create('Source', 'Link to:', array(
                'internal' => 'A page on this site',
                'external' => 'An external link')));

        $fields->push(Wrapper::create(TextField::create('ExternalLink', 'External Link'))->displayIf('Source')->isEqualTo('external')->end());
        $fields->push(Wrapper::create(TreeDropdownField::create('PageID', 'Page', SiteTree::class))->displayIf('Source')->isEqualTo('internal')->end());

        // $fields->push(HTMLEditorField::create('Content', 'Summary')->setRows(3));
        $fields->push(UploadField::create('Icon', 'UIDS Icon Image'));
        $fields->push(TextField::create('Title', 'Title (default: uses selected page\'s title if the page is on this site.)'));
        $fields->push(TextField::create('Summary', 'Summary'));
        $fields->push(TextField::create('LinkText', 'LinkText'));


        return $fields;

    }

    public function Link() {
        if ($this->Source == "external") {
            return $this->ExternalLink;
        } elseif ($this->PageID) {
            return $this->Page()->Link();
        }
    }

    protected function onBeforeWrite() {
        $link = $this->URL;

        if ($link != '') {
            if ($ret = parse_url($link)) {
                if (!isset($ret["scheme"])) {
                    $parsedLink = "https://{$link}";
                    $this->URL = $parsedLink;
                }
            }
        }

        parent::onBeforeWrite();
    }

}

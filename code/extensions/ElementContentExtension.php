<?php

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\DB;
use SilverStripe\ORM\Queries\SQLSelect;

/**
 * This extension handles most of the relationships between pages and element
 * area, it doesn't add an ElementArea to the page however. Because of this,
 * developers can add multiple {@link ElementArea} areas to to a page.
 *
 * If you want multiple ElementalAreas add them as has_ones, add this extensions
 * and MAKE SURE you don't forget to add ElementAreas to $owns, otherwise they
 * will never publish
 *
 * private static $has_one = array(
 *     'ElementalArea1' => ElementalArea::class,
 *     'ElementalArea2' => ElementalArea::class
 * );
 *
 * private static $owns = array(
 *     'ElementalArea1',
 *     'ElementalArea2'
 * );
 *
 * @package elemental
 */
class ElementContentExtension extends DataExtension
{
    public function updateCMSFields($f){


        $contentField = $f->fieldByName('Root.Main.HTML');

        // print_r($f->toArray());
        // print_r($contentField);
 
        $contentField->setRows(30);
        //print_r($contentField);
    }
}

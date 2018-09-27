<?php


use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Security;
use SilverStripe\Versioned\Versioned;
use SilverStripe\ORM\FieldType\DBBoolean;
use SilverStripe\ORM\FieldType\DBHTMLText;
use SilverStripe\ORM\ValidationException;
use SilverStripe\ORM\DB;
use SilverStripe\Core\ClassInfo;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;
use SilverStripe\Control\Controller;
use SilverStripe\Security\PermissionProvider;
use SilverStripe\Security\Permission;
use SilverStripe\Security\Group;
use SilverStripe\Security\Member;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\Forms\ListboxField;
use SilverStripe\Forms\Tab;

/**
 * Block
 * Subclass this basic Block with your more interesting ones.
 *
 * @author Shea Dawson <shea@silverstripe.com.au>
 */
class Block extends DataObject
{

	private static $table_name = 'Block';

    private static $extensions = [
        Versioned::class,
    ];
    /**
     * @var array
     */
    private static $db = [
        'Title' => 'Varchar(255)',
        'CanViewType' => "Enum('Anyone, LoggedInUsers, OnlyTheseUsers', 'Anyone')",
        'ExtraCSSClasses' => 'Varchar'
    ];
    /**
     * @var array
     */
    private static $belongs_many_many = [
        "Pages" => SiteTree::class,
    ];


   
}
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
class Block extends DataObject implements MigratableObject
{

	private static $table_name = 'Block';

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

    public function up()
    {
        //Store if the original entity was published or not (draft)
        $published = $this->IsPublished();
        // If a user has subclassed BlogEntry, it should not be turned into a BlogPost.
        if ($this->ClassName === 'Block') {
            $this->ClassName = 'BlogPost';
            $this->RecordClassName = 'BlogPost';
        }
        //Migrate these key data attributes
        $this->PublishDate = $this->Date;
        $this->AuthorNames = $this->Author;
        $this->InheritSideBar = true;
        //Write and additionally publish the item if it was published before.
        $this->write();
        if ($published) {
            $this->publish('Stage', 'Live');
            $message = "PUBLISHED: ";
        } else {
            $message = "DRAFT: ";
        }
        return $message . $this->Title;

}
   
}
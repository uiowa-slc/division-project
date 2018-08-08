 <?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\Connect\MySQLSchemaManager;

class DivisionFileExtension extends DataExtension {
    private static $create_table_options = [
        MySQLSchemaManager::ID => 'ENGINE=MyISAM'
    ];

}
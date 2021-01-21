<?php

use SilverStripe\ORM\DataObject;

class RssFeedEntry extends DataObject {

	private static $db = array(
		'Title' => 'Text',
		'Content' => 'HTMLText',
		'Link' => 'Text',
		'URLSegment' => 'Varchar',
		'PublishDate' => 'Datetime',
		'ParentID' => 'Int',
		'IsFeatured' => 'Boolean',
		'ExternalURL' => 'Varchar(255)',
		'CanonicalURL' => 'Varchar(255)',
		'FeaturedImageURL' => 'Varchar',
	);

}
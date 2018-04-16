<?php

use SilverStripe\ORM\DataExtension;
class DivisionBlockExtension extends DataExtension {

	private static $db = array(
		'ShowTitle' => 'Boolean(1)'
	);
}

<?php

class BlogTagExtension extends DataExtension {

	private static $db = array(

	);

	private static $has_one = array(
		'Image' => 'Image'
	);

	private static $summary_fields = array(
		'Image.CMSThumbnail', 'Title'
	);

	private static $singular_name = 'Tag';

	private static $plural_name = 'Tags';
}

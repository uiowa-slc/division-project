<?php

use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataExtension;

	class BlogCategoryExtension extends DataExtension {
		private static $db = array(
			'Content' => 'HTMLText'

		);
		private static $has_one = array(
			'Image' => Image::class

		);
		private static $belongs_many_many = array(
			'RecentNewsBlocks' => 'RecentNewsBlock'
		);

		public function updateCMSFields(FieldList $fields){
			$fields->push(new HTMLEditorField('Content'));
			$fields->push(new UploadField(Image::class, 'Background Image'), 'Title');
		}


	}
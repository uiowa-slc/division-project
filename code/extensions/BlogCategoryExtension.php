<?php

	class BlogCategoryExtension extends DataExtension {
		private static $db = array(
			'Content' => 'HTMLText'

		);
		private static $has_one = array(
			'Image' => 'Image'

		);
		private static $belongs_many_many = array(
			'RecentNewsBlocks' => 'RecentNewsBlock'
		);

		public function updateCMSFields(FieldList $fields){
			$fields->push(new HTMLEditorField('Content'));
			$fields->push(new UploadField('Image', 'Background Image'), 'Title');
		}


	}
<?php

class ImageSaveTask extends BuildTask{

	protected $title = 'Image Save Task';
	protected $description = 'This task creates focus points for old images in database';

	protected $enabled = true;

	function run($request){
		$images = Image::get();

		foreach($images as $image){
				print('working on image '.$image->ID. '<br />');
				$image->FocusY = 0;
				$image->FocusX = 0;
				$image->write();
		}
	}

}
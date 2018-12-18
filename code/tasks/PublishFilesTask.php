<?php

use SilverStripe\Dev\BuildTask;
use SilverStripe\ORM\DB;
use SilverStripe\ORM\Queries\SQLSelect;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Folder;
class PublishFilesTask extends BuildTask{

    protected $title = 'Publishes all file and folder objects';
    protected $description = '';

    protected $enabled = true;

    function run($request){

        echo '<h2>publishing all files and folders</h2>';

        $files = File::get();

        foreach($files as $file){
            echo 'Publishing file '.$file->Filename.'<br />';
            $file->publishFile();
        }


        $folders = Folder::get();

        foreach($folders as $folder){
            echo 'Publishing folder '.$folder->Filename.'<br />';
            $folder->publishFile();
        }
    }

}

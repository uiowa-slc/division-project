<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SheaDawson\Blocks\Model\Block;
class ScriptEmbedBlock extends Block{
    
    private static $db = array(
        'ScriptTag' => 'HTMLText',
        'Title' => 'Text',
    );

    private static $defaults = array(


    );

    private static $singular_name = 'Script Embed Block ';  
    private static $table_name = 'ScriptEmbedBlock';

    public function getCMSFields() {

        $self = $this;
        $fields = FieldList::create();

        $fields->push($textField = TextField::create('ScriptTag', 'Script HTML Tag'));


        // $widthField->displayIf('EmbedMethod')->isEqualTo('manual');
        // $heightField->displayIf('EmbedMethod')->isEqualTo('manual');

        return $fields;
    }
    

}
<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use DNADesign\Elemental\Models\BaseElement;
class ScriptEmbedBlock extends BaseElement{
    
    private static $db = array(
        'ScriptTag' => 'HTMLText',
        'Title' => 'Text',
    );

    private static $defaults = array(


    );

    private static $singular_name = 'Script Embed Block ';  
    private static $table_name = 'ScriptEmbedBlock';
    
    public function getType()
    {
        return 'Script Embed Block';
    }
    public function getCMSFields() {

        $self = $this;
$this->beforeUpdateCMSFields(function (FieldList $fields) {

        $fields->push($textField = TextField::create('ScriptTag', 'Script HTML Tag'));


        // $widthField->displayIf('EmbedMethod')->isEqualTo('manual');
        // $heightField->displayIf('EmbedMethod')->isEqualTo('manual');

        });

        return parent::getCMSFields();
    }
    

}

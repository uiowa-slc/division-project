<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\Forms\CompositeField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\NumericField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\Form;
use SilverStripe\CMS\Search\SearchForm;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\Search\FulltextSearchable;

use SilverStripe\Core\Convert;
class TopicSearchForm extends SearchForm {


     public function __construct($controller, $name, $fields = null, $actions = null, $size) {
            //print_r($size);
            // $searchText =  'Search entries under '.$this->owner->Title;
            // $termPlural = $this->owner->obj('TermPlural');

  

            $searchField = new TextField('Search', false, '');
            if($controller->request && $controller->request->getVar('Search')) {

                $searchText = $this->owner->request->getVar('Search');
                $searchTextFiltered = Convert::raw2att($searchText);

                $searchField->setValue($searchText);
            }
            if($size == "large"){
                $searchField->setAttribute('placeholder', 'Search for entries on this website');
            }else{
                $searchField->setAttribute('placeholder', 'Search entries');
            }
            $searchField->setFieldHolderTemplate('TopicSearchFormField_holder');
            $searchField->addExtraClass('topic-search-form__input');

            if($size){
                $searchField->addExtraClass('topic-search-form__input--'.$size); 
            }

            $searchField->setAttribute('title', 'Search for entries');

            $fields = new FieldList(
                $searchField
            );

            $action = FormAction::create('results', 'Search');
            $action->setUseButtonTag(true);



            $action->addExtraClass('topic-search-form__search-button');
            $action->addExtraClass('topic-search-form__search-button--'.$size);

            $action->setTemplate('TopicSearchFormAction');
            $actions = new FieldList(
                $action //this is the only real change to tell the form to use a different function for the action
            );
            $required = new RequiredFields([
                'Search'
            ]);

            parent::__construct($controller, $name, $fields, $actions, $required);

            // $this->Actions()->First()->setTitle('SEARCHSIES');
            //print_r($this->Actions()->toArray());


            $this->classesToSearch(FulltextSearchable::get_searchable_classes());
            $this->setTemplate('TopicSearchForm');
            $this->addExtraClass('topic-search-form');
            $this->addExtraClass('topic-search-form--'.$size);

        }
    }
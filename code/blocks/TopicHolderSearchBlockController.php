<?php
namespace DNADesign\Elemental\Controllers;

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\Form;
use SheaDawson\Blocks\Controllers\BlockController;
class TopicHolderSearchBlockController extends BlockController {

        private static $allowed_actions = array(
            'TopicSearchForm',
            'submit'

        );

        public function TopicSearchForm(){
            $searchText =  'Searching under '.$this->TopicHolder()->Title;

            if($this->owner->request && $this->owner->request->getVar('Search')) {
                $searchText = $this->owner->request->getVar('Search');
            }
            $searchField = new TextField('Search', false, '');
            $searchField->setAttribute('placeholder', 'Search for entries under '.$this->TopicHolder()->Title);
            $searchField->setAttribute('class', 'topic-search-form__input');
            $fields = new FieldList(
                $searchField
            );

            $action = FormAction::create('submit', _t('SearchForm.GO', 'Search'));
            $action->addExtraClass('topic-search-form__search-button');
            $actions = new FieldList(
                $action //this is the only real change to tell the form to use a different function for the action
            );
            $form = new Form($this, 'TopicSearchForm', $fields, $actions);
            // $form->classesToSearch(FulltextSearchable::get_searchable_classes());
            $form->setTemplate('SearchForm');
            $form->addExtraClass('topic-search-form');
            return $form;

        }
         public function submit($data, $form){

            $topicHolder = $this->TopicHolder();
            $query = $data['Search'];
            // print_r($query);

            return $this->redirect($topicHolder->Link() . 'TopicSearchForm?Search=' . $query . '&action_results=Search');
        }
}
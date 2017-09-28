<?php

class TopicHolderSearchBlock extends Block {

	private static $db = array(

    );

    private static $has_one = array(
        'TopicHolder' => 'TopicHolder',
        'BackgroundImage' => 'Image'

    );
    private static $many_many = array(

    );

    public function getCMSFields(){
        $fields = parent::getCMSFields();
        $field = DropdownField::create('TopicHolderID', 'Select a Topic:', TopicHolder::get()->map('ID', 'Title'));
        $fields->addFieldToTab('Root.Main', $field);
        $fields->addFieldToTab("Root.Main", new UploadField("BackgroundImage", "Background Image"));

        return $fields;
    }

    public function TopicSearchForm(){
        return $this->getController()->TopicSearchForm();
    }

    
}

class TopicHolderSearchBlock_Controller extends Block_Controller {

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
            $searchField->addExtraClass('topic-search-form__input');
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
            $form->setTemplate('TopicSearchForm');
            return $form;

        }
         public function submit($data, $form){

            $topicHolder = $this->TopicHolder();
            $query = $data['Search'];
            // print_r($query);

            return $this->redirect($topicHolder->Link() . 'TopicSearchForm?Search=' . $query . '&action_results=Search');
        }
}

   
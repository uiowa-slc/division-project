<?php

use SilverStripe\Blog\Model\BlogController;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\CMS\Search\SearchForm;
use SilverStripe\ORM\Search\FulltextSearchable;
use SilverStripe\ORM\FieldType\DBField;
class TopicHolderController extends BlogController{

	private static $allowed_actions = array(
		'TopicSearchForm',
        'results'
	);

    public function TopicSearchForm() {

            $searchText =  'Search entries under '.$this->owner->Title;
            $termPlural = $this->owner->obj('TermPlural');

            if($this->owner->request && $this->owner->request->getVar('Search')) {
                $searchText = $this->owner->request->getVar('Search');
            }
            $searchField = new TextField('Search', false, '');
            if($termPlural){
                $searchField->setAttribute('placeholder', 'Search for '.$termPlural->LowerCase().' on this site');
            }else{
                $searchField->setAttribute('placeholder', 'Search for entries in this section');
            }


            
            $searchField->setFieldHolderTemplate('TopicSearchFormField_holder');
            $searchField->setAttribute('class', 'topic-search-form__input');

            $searchField->addExtraClass('topic-search-form__input');
            $searchField->setAttribute('title', 'Search for entries');

            $fields = new FieldList(
                $searchField
            );

            $action = FormAction::create('results', 'Search');
            $action->setUseButtonTag(true);
            $action->addExtraClass('topic-search-form__search-button');
            $action->setTemplate('TopicSearchFormAction');
            $actions = new FieldList(
                $action //this is the only real change to tell the form to use a different function for the action
            );

            $form = new SearchForm($this->owner, 'TopicSearchForm', $fields, $actions);
            $form->classesToSearch(FulltextSearchable::get_searchable_classes());
            $form->setTemplate('TopicSearchForm');
            $form->addExtraClass('topic-search-form');
            //print_r($form->getAttributesHTML());
            //print_r($form);
            return $form;
        }
    /**
     * Process and render search results.
     *
     * @param array $data The raw request data submitted by user
     * @param SearchForm $form The form instance that was submitted
     * @param SS_HTTPRequest $request Request generated for this action
     */
    public function results($data, $form) {

        $results = $form->getResults();

        $resultsFiltered = $results->filter(array('ParentID' => $this->owner->ID));

        $data = array(
            'Results' => $resultsFiltered,
            'Query' => DBField::create_field('Text', $form->getSearchQuery()),
            'Title' => _t('SearchForm.SearchResults', 'Search Results'),
            'Holder' => $this->owner
        );


        return $this->owner->customise($data)->renderWith(array($this->owner->ClassName.'_results', 'TopicHolder_results', 'Page'));
    }
}

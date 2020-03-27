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

    public function TopicSearchFormSized($size = "large"){

        return $this->TopicSearchForm($this, 'SearchForm', null, null, $size);
    }

    public function TopicSearchForm($request, $name, $fields, $actions, $size = "large") {
        return new TopicSearchForm($this, 'SearchForm', null, null, $size);
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

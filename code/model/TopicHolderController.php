<?php

use SilverStripe\Blog\Model\BlogCategory;
use SilverStripe\Blog\Model\BlogController;
use SilverStripe\Blog\Model\BlogTag;
use SilverStripe\CMS\Search\SearchForm;
use SilverStripe\Forms\Form;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\FieldType\DBField;

class TopicHolderController extends BlogController {

	private static $allowed_actions = array(
		'TopicSearchForm',
		'results',
	);

	public function TopicSearchFormSized($size = "large") {

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
		$query = $form->getSearchQuery();

        $results = new ArrayList();
        $resultsFiltered = new ArrayList();

		$categoryResults = new ArrayList();
		$categoryTopics = new ArrayList();

		$tagResults = new ArrayList();
		$tagTopics = new ArrayList();

        if($query != ''){
            $results = $form->getResults();
    		$categoryResults = BlogCategory::get()->filter(array('Title:PartialMatch' => $query, 'BlogID' => $this->ID));

    		foreach ($categoryResults as $catResult) {
    			$categoryTopics->merge($catResult->BlogPosts());
    		}

    		$tagResults = BlogTag::get()->filter(array('Title:PartialMatch' => $query, 'BlogID' => $this->ID));
    		// print_r($categoryResults);
    		foreach ($tagResults as $tagResult) {
    			$tagTopics->merge($tagResult->BlogPosts());
    		}

    		$resultsFiltered = $results->filter(array('ParentID' => $this->owner->ID));
    		$resultsFiltered->merge($categoryTopics);
    		$resultsFiltered->merge($tagTopics);

    		$resultsFiltered->removeDuplicates();

        }

		$data = array(
			'Results' => $resultsFiltered,
			'CategoryResults' => $categoryResults,
			'TagResults' => $tagResults,
			'Query' => DBField::create_field('Text', $query),
			'Title' => _t('SearchForm.SearchResults', 'Search Results'),
			'Holder' => $this->owner,
		);

		return $this->owner->customise($data)->renderWith(array($this->owner->ClassName . '_results', 'TopicHolder_results', 'Page'));
	}
}

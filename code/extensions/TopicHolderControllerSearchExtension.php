<?php
class TopicHolderControllerSearchExtension extends Extension{



	public static $allowed_actions = array('TopicSearchForm', 'topicresults');

	public function SearchForm() {
			
			$searchText =  'Search topics';

			if($this->owner->request && $this->owner->request->getVar('Search')) {
				$searchText = $this->owner->request->getVar('Search');
			}
			$searchField = new TextField('Search', false, '');
			$searchField->setAttribute('placeholder', 'Search topics listed under '.$this->owner->Title);
			$fields = new FieldList(
				$searchField
			);
			$actions = new FieldList(
				new FormAction('results', _t('SearchForm.GO', 'Go')) //this is the only real change to tell the form to use a different function for the action
			);
			$form = new SearchForm($this->owner, 'SearchForm', $fields, $actions);
			$form->classesToSearch(FulltextSearchable::get_searchable_classes());
			return $form;
		}
	/**
	 * Process and render search results.
	 *
	 * @param array $data The raw request data submitted by user
	 * @param SearchForm $form The form instance that was submitted
	 * @param SS_HTTPRequest $request Request generated for this action
	 */
	public function results($data, $form, $request) {

		$results = $form->getResults();

		$resultsFiltered = $results->filter(array('ParentID' => $this->owner->ID));

		$data = array(
			'Results' => $resultsFiltered,
			'Query' => DBField::create_field('Text', $form->getSearchQuery()),
			'Title' => _t('SearchForm.SearchResults', 'Search Results')
		);


		return $this->owner->customise($data)->renderWith(array('TopicHolder_results', 'Page'));
	}
}
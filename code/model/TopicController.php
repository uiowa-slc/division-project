<?php

use SilverStripe\Blog\Model\BlogPostController;
use SilverStripe\Control\Controller;

class TopicController extends BlogPostController{
    private static $allowed_actions = array('TopicSearchForm', 'topicresults');

    public function TopicSearchForm(){
        //$current = Controller::curr();
        $controller = TopicHolderController::create($this);
        // $current = $this->getController();

        $topicHolder = $this->Parent();

        // $controller->setRequest($current->getRequest());
        //print_r($this->getController());
        $form = $controller->TopicSearchForm();


        $form->setFormAction(
            Controller::join_links(
                $topicHolder->Link(),
                'TopicSearchForm'
            )
        );
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

        $resultsFiltered = $results->filter(array('ParentID' => $this->owner->getParent()->ID));

        $data = array(
            'Results' => $resultsFiltered,
            'Query' => DBField::create_field('Text', $form->getSearchQuery()),
            'Title' => _t('SearchForm.SearchResults', 'Search Results')
        );


        return $this->owner->customise($data)->renderWith(array($this->owner->Parent()->ClassName.'_results', 'TopicHolder_results', 'Page'));
    }
        /**
         * Return the associated UserDefinedFormController
         *
         * @return UserDefinedFormController
         */
        public function getTopicHolderController()
        {
            return $this->topicHolderController;
        }
        /**
         * Set the associated UserDefinedFormController
         *
         * @param UserDefinedFormController $controller
         * @return $this
         */
        public function setTopicHolderController(TopicHolderController $controller)
        {
            $this->topicHolderController = $controller;
            return $this;
        }
}

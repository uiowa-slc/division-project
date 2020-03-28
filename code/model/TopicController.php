<?php

use SilverStripe\Blog\Model\BlogPostController;
use SilverStripe\Control\Controller;
use SilverStripe\ORM\FieldType\DBField;

class TopicController extends BlogPostController{
    private static $allowed_actions = array('TopicSearchForm', 'topicresults');

    public function TopicSearchFormSized($size = "large"){
        return $this->TopicSearchForm($this, 'SearchForm', null, null, $size);
    }

    public function TopicSearchForm($request, $name, $fields, $actions, $size = "large") {
        //$current = Controller::curr();
        $controller = TopicHolderController::create($this);
        // $current = $this->getController();

        $topicHolder = $this->Parent();

        // $controller->setRequest($current->getRequest());
        //print_r($this->getController());
        $form = new TopicSearchForm($controller, 'SearchForm', null, null, $size);


        $form->setFormAction(
            Controller::join_links(
                $topicHolder->Link(),
                'SearchForm'
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

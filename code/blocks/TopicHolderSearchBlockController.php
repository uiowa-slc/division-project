<?php


use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\Form;
use DNADesign\Elemental\Controllers\ElementController;
class TopicHolderSearchBlockController extends ElementController {

        private static $allowed_actions = array(
            'TopicSearchForm',
            'submit'

        );

        protected $topicHolderController;

        protected function init()
        {
            parent::init();
            $controller = $this->getTopicHolderController() ?: TopicHolderController::create($this->element);
            $controller->setRequest($this->getRequest());
            $controller->doInit();
            $this->setTopicHolderController($controller);
        }

         public function submit($data, $form){

            $topicHolder = $this->TopicHolder();
            $query = $data['Search'];
             print_r($query);

            // return $this->redirect($topicHolder->Link() . 'TopicSearchForm?Search=' . $query . '&action_results=Search');
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

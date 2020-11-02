<?php

use SilverStripe\Blog\Model\BlogPostController;
use SilverStripe\Control\Controller;

class TopicController extends BlogPostController {
	private static $allowed_actions = array('TopicSearchForm', 'topicresults');

	public function TopicSearchFormSized($size = "large") {
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
	 * Return the associated UserDefinedFormController
	 *
	 * @return UserDefinedFormController
	 */
	public function getTopicHolderController() {
		return $this->topicHolderController;
	}
	/**
	 * Set the associated UserDefinedFormController
	 *
	 * @param UserDefinedFormController $controller
	 * @return $this
	 */
	public function setTopicHolderController(TopicHolderController $controller) {
		$this->topicHolderController = $controller;
		return $this;
	}
}

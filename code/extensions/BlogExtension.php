<?php

class BlogExtension extends DataExtension {

	private static $db = array(
		'HideDatesAndAuthors' => 'Boolean',
		'SortAlphabetically' => 'Boolean'
	);


	public function getCMSFields() {
		$this->extend('updateCMSFields', $fields);

		return $fields;
	}

	public function updateSettingsFields(FieldList $fields) {

		$fields->addFieldToTab('Root.Settings', new CheckboxField('HideDatesAndAuthors', 'Hide dates and authors from the blog listing page?'));
		$fields->addFieldToTab('Root.Settings', new CheckboxField('SortAlphabetically', 'Sort posts alphabetically instead of by date?'));

	}

	public function BlogPostsAlpha(){
        $allPosts = $this->owner->blogPosts->sort('Title ASC') ?: new ArrayList();

        $posts = new PaginatedList($allPosts);

        // Set appropriate page size
        if ($this->owner->PostsPerPage > 0) {
            $pageSize = $this->owner->PostsPerPage;
        } elseif ($count = $allPosts->count()) {
            $pageSize = $count;
        } else {
            $pageSize = 99999;
        }
        $posts->setPageLength($pageSize);

        // Set current page
        $start = Controller::curr()->getRequest()->getVar($posts->getPaginationGetVar());
        $posts->setPageStart($start);

        return $posts;
	}


}
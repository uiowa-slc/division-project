<?php

class Topic extends BlogPost {

	private static $many_many = array(
		'Questions' => 'TopicQuestion',
		'Links' => 'TopicLink'
	);

	private static $belongs_many_many = array(
	
	);

    public function AllTags(){
        $tags = BlogTag::get()->filter(array('BlogID' => $this->ParentID))->sort('Title ASC');
        return $tags;
    }

	public function getCMSFields(){
		
		$fields = parent::getCMSFields();
		$fields->removeByName('AuthorNames');
		$fields->removeByName('PhotosBy');
		$fields->removeByName('PhotosByEmail');

		$fields->removeByName('Blocks');
		$fields->removeByName('MetaData');
		$fields->removeByName('Widgets');

		$qField = TagField::create(
						'Questions',
						'Questions relevant to this topic:',
						TopicQuestion::get(),
						$this->Questions()
					)->setShouldLazyLoad(true)->setCanCreate(false);

		$fields->addFieldToTab('Root.Main', $qField, 'Content');

		$linkGrid = new GridField(
			'Links',
			'Links relevant to this topic',
			$this->Links(),
			GridFieldConfig::create()
				->addComponent(new GridFieldButtonRow('before'))
				->addComponent(new GridFieldToolbarHeader())
				->addComponent(new GridFieldTitleHeader())
				->addComponent(new GridFieldEditableColumns())
				->addComponent(new GridFieldDeleteAction())
				->addComponent(new GridFieldAddNewInlineButton())
		);

		
		$linkGrid->getConfig()->getComponentByType('GridFieldEditableColumns')->setDisplayFields(array(
			'Title' => array(
				'title' => 'Link Description',
				'field' => 'TextField'
			),
			'URL' => array(
				'title' => 'Link URL (include https://)',
				'field' => 'TextField'
			)
		));
		$fields->insertAfter(new Tab('RelatedLinks', 'Related links'), 'Main');
		$fields->addFieldToTab('Root.RelatedLinks', $linkGrid);


		return $fields;

	}

}


class Topic_Controller extends BlogPost_Controller{



}
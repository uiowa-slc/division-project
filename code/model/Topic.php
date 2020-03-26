<?php

use SilverStripe\Blog\Model\BlogTag;
use SilverStripe\TagField\TagField;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldButtonRow;
use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
use Symbiote\GridFieldExtensions\GridFieldTitleHeader;
use Symbiote\GridFieldExtensions\GridFieldEditableColumns;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use Symbiote\GridFieldExtensions\GridFieldAddNewInlineButton;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\Tab;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\Core\Config\Config;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\Blog\Controllers\BlogPostController;
// use Sunra\PhpSimple\HtmlDomParser;

use PHPHtmlParser\Dom;
use PHPHtmlParser\Dom\HtmlNode;

class Topic extends BlogPost {


	private static $db = [
		'WebsiteLink' => 'Varchar(255)',
		'FeaturedSortOrder' => 'Int',
	];

	private static $many_many = array(
		'Questions' => 'TopicQuestion',
		'Links' => 'TopicLink'
	);

	private static $has_one = array(
		'TopicHolderFeatured' => 'TopicHolder'
	);

	private static $belongs_many_many = array(
	
	);


	private static $icon_class = 'font-icon-book-open';
	private static $can_be_root = false;

    public function AllTags(){
        $tags = BlogTag::get()->filter(array('BlogID' => $this->ParentID))->sort('Title ASC');
        return $tags;
    }

    public function ContentDemotedHeadings(){
    	$content = $this->Content;

		$dom = new Dom;
		$dom->load($content);

		$conversionArray = array(
			'h1' => 'h2',
			'h2' => 'h3',
			'h3' => 'h4',
			'h5' => 'h6'
		);


    	 foreach($conversionArray as $tagName => $tagNewValue){



				/** @var HtmlNode[] $tags */
				foreach($dom->find($tagName) as $tag) {

					// $tag->name = $tagNewValue;
					// print_r($tag);
				    $changeTag = function() {
				        $this->name = 'h3';
				    };
				    $changeTag->call($tag->tag);
				};



    	 }

    	 $exportedContent = new SilverStripe\ORM\FieldType\DBHTMLText();
    	 $exportedContent = (string)$dom;;


    	 return $exportedContent;
	    

    }



    //almost works but is too aggressive and creates some weird utf characters
    // public function ContentDemotedHeadings(){
    // 	$content = $this->Content;

    // 	 $dom = new DOMDocument();
    // 	 $dom->loadHTML($content); 

    // 	 $conversionArray = array(
    // 	 	'h1' => 'h2',
    // 	 	'h2' => 'h3',
    // 	 	'h3' => 'h4',
    // 	 	'h5' => 'h6'
    // 	 );

    // 	 foreach($conversionArray as $tagName => $tagNewValue){
    // 	 		$elements = $dom->getElementsByTagName($tagName);
			 //    for ($i = $elements->length - 1; $i >= 0; $i --) {
			 //    	$nodeBefore = $elements->item($i);
			 //    	$nodeAfter = $dom->createElement($tagNewValue, $nodeBefore->nodeValue);
			 //    	$nodeBefore->parentNode->replaceChild($nodeAfter, $nodeBefore);
			 //    } 
    // 	 }

    // 	 $exportedContent = new SilverStripe\ORM\FieldType\DBHTMLText();
    // 	 $exportedContent = $dom->saveHTML();


    // 	 return $exportedContent;
	    

    // }





	public function getCMSFields(){
		
		$fields = parent::getCMSFields();
		$fields->removeByName('AuthorNames');
		$fields->removeByName('PhotosBy');
		$fields->removeByName('PhotosByEmail');
		$fields->removeByName('Authors');
		$fields->removeByName('Questions');
		$fields->removeByName('IsFeatured');
		$fields->removeByName('SummaryQuestions');
		$fields->removeByName('ExternalURL');
		$fields->removeByName('LayoutType');
		$fields->removeByName('Metadata');

		$fields->removeByName('Blocks');
		$fields->removeByName('MetaData');
		$fields->removeByName('Widgets');
		$fields->renameField('Suburb', 'City');
		// $qField = TagField::create(
		// 				'Questions',
		// 				'Questions relevant to this topic:',
		// 				TopicQuestion::get(),
		// 				$this->Questions()
		// 			)->setShouldLazyLoad(true)->setCanCreate(false);

		// $fields->addFieldToTab('Root.Questions', $qField);
		
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

		$catField = $fields->fieldByName('Root.PostOptions.Categories');
		$catField->setShouldLazyLoad(false);
		
		$tagField = $fields->fieldByName('Root.PostOptions.Tags');
		$tagField->setShouldLazyLoad(false);


		if($this->Parent()->DisableTags){
			$tagField->setDisabled(true);
			$tagField->setRightTitle('Tags have been disabled for this section, please use categories.');

		}

		if($this->Parent()->DisableCategories){
			$catField->setDisabled(true);
			$catField->setRightTitle('Categories have been disabled for this section, please use tags.');
		}
		
		$linkGrid->getConfig()->getComponentByType(GridFieldEditableColumns::class)->setDisplayFields(array(
			'Title' => array(
				'title' => 'Link Description',
				'field' => TextField::class
			),
			'URL' => array(
				'title' => 'Link URL (include https://)',
				'field' => TextField::class
			)
		));
		// $fields->insertAfter(new Tab('RelatedLinks', 'Related links'), 'Main');
		// $fields->addFieldToTab('Root.RelatedLinks', $linkGrid);
		$fields->addFieldToTab('Root.Main', TextField::create('WebsiteLink', 'Website link (include https://)'), 'CustomSummary');

		return $fields;

	}

    public function TopicsByLetter(){
    	$alphas = range('A', 'Z');
    	$letterArrayList = new ArrayList();

    	foreach($alphas as $letter){
    		$letterTopics = Topic::get()->filter(array('Title:StartsWith' => $letter, 'ParentID' => $this->ParentID));

    		if($letterTopics->Count() > 0){
        		$letterArrayData = new ArrayData(array('Letter' => $letter, 'Topics' => $letterTopics));
    			$letterArrayList->push($letterArrayData);			
    		}
    		 
    	}

    	//print_r($letterArrayList);
    	return $letterArrayList;
    }
	//TODO: Move to a new BlogObjectExtension.
	public function TermPlural(){

		return $this->Parent()->TermPlural;

	}

	/**
	 * Returns a static google map of the address, linking out to the address.
	 *
	 * @param int $width
	 * @param int $height
	 * @return string
	 */
	public function GoogleMap() {
		$data = $this->owner->customise(array(
			'Address' => rawurlencode($this->getFullAddress()),
			'GoogleAPIKey' => Config::inst()->get('GoogleGeocoding', 'google_api_key')
		));
		return $data->renderWith('TopicGoogleMap');
	}


}
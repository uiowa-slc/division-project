<?php

use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Blog\Model\Blog;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Core\ClassInfo;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Security\Permission;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Parsers\ShortcodeParser;
use SilverStripe\View\SSViewer;

class DivisionPage extends DataExtension {
	private static $db = array(
		'OgTitle' => 'Text',
		'OgDescription' => 'Text',
		'PreventSearchEngineIndex' => 'Boolean',
		'LayoutType' => 'Varchar(155)',
		'YoutubeBackgroundEmbed' => 'Varchar(11)',
		'ShowChildPages' => 'Boolean(1)',
		'ShowChildrenInDropdown' => 'Boolean(1)',
		'FullImageAltText' => 'Text',
		'DarkMode' => 'Boolean',
        'VisuallyHideTitle' => 'Boolean',
        'HideSideNav' => 'Boolean'
	);

	private static $has_one = array(
		'SidebarArea' => ElementalArea::class,
		'AfterContentConstrained' => ElementalArea::class,
		'BeforeContent' => ElementalArea::class,
		'BeforeContentConstrained' => ElementalArea::class,
		'AfterContent' => ElementalArea::class,
		'BackgroundImage' => Image::class,
		'FeatureHolderImage' => Image::class,
		'OgImage' => Image::class,
	);
	private static $owns = array(
		'BackgroundImage',
		'OgImage',
		'FeatureHolderImage',
		'BackgroundImage',
		'FeatureHolderImage',
		'SidebarArea',
		'AfterContentConstrained',
		'BeforeContent',
		'BeforeContentConstrained',
		'AfterContent',
	);
	private static $many_many = array(

	);

	private static $belongs_many_many = array(
		'TileGridBlocks' => 'TileGridBlock',
		'PageSliderBlocks' => 'PageSliderBlock',
	);

	private static $many_many_extraFields = array(
		'SidebarItems' => array(
			'SortOrder' => 'Int',
		),
	);

	private static $layout_types = array(
		'BackgroundVideo' => 'Background Video, Overlay',
		'BackgroundImage' => 'Background Image, Overlay',
		'FullImage' => 'Full-sized image, not a background',
		'NoSideNav' => 'No side navigation (even if this page has child pages)',
	);

	private static $plural_name = 'Pages';

	private static $defaults = array(

	);

	private static $casting = [
		'ExpandShortcode' => 'HTMLText',
	];

	private static $hide_from_hierarchy = array(BlogPost::class, 'Topic');

	public function ClassAncestry() {
		$ancestryArray = ClassInfo::ancestry($this->owner->ClassName);
		$ancestryString = implode(' ', $ancestryArray);

		return $ancestryString;
	}

	public function updateCMSFields(FieldList $f) {
		// $f = parent::getCMSFields();
		$f->removeByName("ExtraMeta");
		$f->removeByName("Dependent");

		if (!($this->owner instanceof Blog) && !($this->owner instanceof BlogPost)) {

			$f->removeByName("Widgets");

		}

		$SidebarAreaField = $f->dataFieldByName('SidebarArea');

		if ($SidebarAreaField) {
			$SidebarAreaField->setTitle('Sidebar');
			$SidebarAreaConfig = $SidebarAreaField->getConfig();
			$SidebarAreaConfig->removeComponentsByType('SilverStripe\Forms\GridField\GridFieldDeleteAction');
			$f->removeByName('SidebarArea');

			$f->addFieldToTab('Root.Blocks', $SidebarAreaField);
            $f->insertBefore('SidebarArea', HeaderField::create('SideBarAreaTitle', 'Sidebar'));
		}

		$beforecontentField = $f->dataFieldByName('BeforeContent');

		if ($beforecontentField) {
			$beforecontentField->setTitle('Before Content');

			$beforecontentConfig = $beforecontentField->getConfig();
			$beforecontentConfig->removeComponentsByType('SilverStripe\Forms\GridField\GridFieldDeleteAction');

			$f->remove($beforecontentField);
			$f->addFieldToTab('Root.Blocks', $beforecontentField);
            $f->insertBefore('BeforeContent', HeaderField::create('BeforeContentAreaTitle', 'Before Content (Full Browser Width)'));
		}

		$beforecontentConstrainedField = $f->dataFieldByName('BeforeContentConstrained');

		if ($beforecontentConstrainedField) {
			$beforecontentConstrainedField->setTitle('Before Content (Constrained)');
			$beforecontentConstrainedConfig = $beforecontentConstrainedField->getConfig();
			$beforecontentConstrainedConfig->removeComponentsByType('SilverStripe\Forms\GridField\GridFieldDeleteAction');
			$f->removeByName('BeforeContentConstrained');
			$f->addFieldToTab('Root.Blocks', $beforecontentConstrainedField);
            $f->insertBefore('BeforeContentConstrained', HeaderField::create('BeforeContentConstrainedTitle', 'Before Content (Constrained Width)'));
		}

		$aftercontentAreaField = $f->dataFieldByName('AfterContent');

		if ($aftercontentAreaField) {
			$aftercontentAreaField->setTitle('After Content');
			$aftercontentAreaConfig = $aftercontentAreaField->getConfig();
			$aftercontentAreaConfig->removeComponentsByType('SilverStripe\Forms\GridField\GridFieldDeleteAction');
			$f->removeByName('AfterContent');
			$f->addFieldToTab('Root.Blocks', $aftercontentAreaField);
            $f->insertBefore('AfterContent', HeaderField::create('AfterContentTitle', 'After Content (Full Browser Width)'));
		}

		$aftercontentConstrainedField = $f->dataFieldByName('AfterContentConstrained');

		if ($aftercontentConstrainedField) {
			$aftercontentConstrainedField->setTitle('After Content (Constrained)');
			$aftercontentConstrainedAreaConfig = $aftercontentConstrainedField->getConfig();
			$aftercontentConstrainedAreaConfig->removeComponentsByType('SilverStripe\Forms\GridField\GridFieldDeleteAction');
			$f->removeByName('AfterContentConstrained');
			$f->addFieldToTab('Root.Blocks', $aftercontentConstrainedField);
            $f->insertBefore('AfterContentConstrained', HeaderField::create('AfterContentConstrainedTitle', 'After Content (Constrained Width)'));
		}

		$f->removeByName('ElementalArea');
		$f->removeByName('ContentArea');

		$config = SiteConfig::current_site_config();

		if ($metadataField = $f->fieldByName('Root.Main.Metadata')) {
			$metadataField->setTitle('Summary');

			$f->renameField('MetaDescription', 'Short summary of this content');

			$metaDesc = $f->fieldByName('Root.Main.Metadata.MetaDescription');
			$metaDesc->setRightTitle('This summary shows up in Google results and pages above this one on this website.');
			// 	$f->removeFieldFromTab('Root.Main', 'Metadata');
			// 	$f->addFieldToTab('Root.MetaData', $metadataField);
		}

		if (Permission::check('ADMIN')) {
			$f->addFieldToTab('Root.Main', UploadField::create('BackgroundImage', 'Background Image')->setDescription('Preferred image dimensions: 1600 x 500'), 'Content');
		}
		$f->addFieldToTab('Root.SocialMediaSharing', new LiteralField('SocialMediaInfo', '<p>All information placed in the fields below will override any fields filled out in the "Main Content" tab.</p>'));

		$f->addFieldToTab("Root.SocialMediaSharing", new UploadField('OgImage', 'Social Share Image'));
		$f->addFieldToTab('Root.SocialMediaSharing', new TextField('OgTitle', 'Social Share Title'));
		$f->addFieldToTab('Root.SocialMediaSharing', new TextareaField('OgDescription', 'Social Share Description'));

		$f->addFieldToTab('Root.Main', HTMLEditorField::create('Content')->addExtraClass('stacked'));

		$parent = $this->owner->Parent();
		if ((isset($parent)) && ($parent->ClassName == 'FeatureHolderPage')) {
			$f->addFieldToTab('Root.Main', new UploadField('FeatureHolderImage', 'Feature Holder Image (shown in parent)'), 'Content');
		}

	}

	public function LayoutTypes() {
		return $this->owner->stat('layout_types');
	}

	public function updateSettingsFields($f) {

		$f->addFieldToTab('Root.Settings', CheckboxField::create('PreventSearchEngineIndex', 'Prevent search engines from indexing this page'));

        $f->addFieldToTab('Root.Settings', CheckboxField::create('VisuallyHideTitle', 'Visually hide title'));
		$f->addFieldToTab('Root.Settings', CheckboxField::create('ShowChildPages', 'Show child pages if available (Yes)'));
		$f->addFieldToTab('Root.Settings', CheckboxField::create('ShowChildrenInDropdown', 'Show child pages in a dropdown menu if page is in the top bar (Yes)'));

        // Only allow this field on a standard page, since not all of the templates are updated for this option/working yet.
        if($this->owner->ClassName == 'Page'){
            $f->addFieldToTab('Root.Settings', CheckboxField::create('HideSideNav', 'Hide side navigation'));
        }

		// $f->addFieldToTab('Root.Settings', CheckboxField::create('DarkMode', 'Dark Mode (Experimental)'));

		$layoutOptionsField = DropdownField::create(
			'LayoutType',
			'Layout type',
			$this->owner->LayoutTypes()
		)->setEmptyString('(Default Layout)');
		$f->addFieldToTab('Root.Settings', $layoutOptionsField);

		$f->addFieldsToTab("Root.Settings", array(
			$embed = \EdgarIndustries\YouTubeField\YouTubeField::create("YoutubeBackgroundEmbed", "Video"
			)), 'LayoutType');
		$embed->displayIf('LayoutType')->isEqualTo('BackgroundVideo');
		$f->addFieldsToTab("Root.Settings", array(
			$fullImgAlt = TextField::create("FullImageAltText", "Alt Text For Background Image (required if image has text in it!)"
			)->addExtraClass('stacked')), 'LayoutType');
		$fullImgAlt->displayIf('LayoutType')->isEqualTo('FullImage');

	}

	public function getSidebarItems() {
		return $this->owner->getManyManyComponents('SidebarItems')->sort('SortOrder');
	}

	public function getPageTypeTheme() {
		if ($this->owner->getPageTypeTheme) {
			// print_r($this->getPageTypeTheme);
			return $this->owner->getPageTypeTheme;
		}
	}

	public function DarkLightHeader() {
		$siteConfig = SiteConfig::current_site_config();
		$owner = $this->owner;

		//If the page type forces a particular dark/light scheme (eg homepage), defer to that first.
		if ($owner->pageTypeTheme) {
			return $owner->pageTypeTheme;
			//Check page's individual CMS setting:
		} elseif ($owner->DarkMode) {
			return 'dark-header';
			//Otherwise, check global settings
		} elseif ($siteConfig->UseDarkTheme) {
			return 'dark-header';
		}

		return 'light-header';

	}
	//Frontend labels for various page types when the user sees them in site search results:
	public function NiceName() {
		$niceNames = array(
			'Page' => '',
			'StaffPage' => 'Staff Member',
			'BlogPost' => 'News',
			'Blog' => '',
			'SiteConfigExtension' => '',
		);
		if (isset($niceNames[$this->owner->singular_name()])) {
			$niceClassName = $niceNames[$this->owner->singular_name()];
			return $niceClassName;
		} else {
			return preg_replace('/([a-z]+)([A-Z])/', '$1 $2', $this->owner->singular_name());
		}
	}

	public function ContentSummary() {

		$str = $this->owner->Content;

		if ((empty($str)) || ($str == '')) {
			return null;
		}

		$dom = new DOMDocument();
		$dom->loadHTML($str);

		$xp = new DOMXPath($dom);

		$res = $xp->query('//p');

		if ($res[0]) {
			$firstParagraph = $res[0]->nodeValue;
			return $firstParagraph;
		}

	}

//Shortcodes:

	public static function StaffHolderShortcode($arguments, $content = null, $parser = null, $tagname) {
		$template = new SSViewer('StaffHolderShortcode');

		$holder = StaffHolderPage::get()->filter(array('ID' => $arguments['id']))->First();

		if (!$holder) {
			return null;
		}

		$customise = array(
			'StaffHolder' => $holder,
		);

		return $template->process(new ArrayData($customise));
	}

	public static function ExpandShortcode($arguments, $content = null, $parser = null, $tagName) {

		$template = new SSViewer('ExpandShortcode');
		$title = false;
		$image = false;

		//Get expander content from another page:
		if (isset($arguments['page'])) {
			if (is_numeric($arguments['page'])) {
				$page = SiteTree::get()->filter(array('ID' => $arguments['page']))->First();
			}

			if ($page) {
				//Reparse shortcodes when getting content from another page since we're acting in a shortcode itself right now.
				$parser = ShortcodeParser::get();
				$parsedContent = $parser->parse($page->Content);
				$content = $parsedContent;
			}
		}else{
                //Reparse Parse shortcodes on regular $content for internal links and images, etc.
                $parser = ShortcodeParser::get();
                $parsedContent = $parser->parse($content);
                $content = $parsedContent;
        }

		if (isset($arguments['title'])) {
			$title = $arguments['title'];
		} elseif (isset($page)) {
			$title = $page->Title;
		}

		if (isset($arguments['image'])) {
			$image = $arguments['image'];
		}

		$customise = array(
			'Title' => $title,
			'ImageURL' => $image,
			'Content' => $content,
		);

		return $template->process(new ArrayData($customise));

		//return "<em>" . $tagName . "</em> " . $content . "; " . count($arguments) . " arguments.";
	}

}

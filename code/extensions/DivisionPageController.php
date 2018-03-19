<?php

use SilverStripe\Core\Convert;
use SilverStripe\ORM\ArrayList;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\View\SSViewer;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\ArrayData;
use SilverStripe\Core\Extension;
class DivisionPageController extends Extension {


	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array(
		'autoComplete',
		'autoCompleteResults'
	);
	private static $url_handlers = array (
		'autoComplete' => 'autoComplete',
		'autoCompleteResults' => 'autoCompleteResults'
	);
	public function init() {
		parent::init();
	}

	public function index($r) {
		$page = $this->owner;
		// print_r($page->ClassName.'_'.$page->LayoutType);
		return $page->renderWith(array($page->ClassName.'_'.$page->LayoutType, $page->ClassName, 'Page'));
	}

	public function NavLength(){
		$menu = $this->owner->getMenu();
		$count = $menu->Count();
		$length = 'small';
		if($count >= 7){
			$length ='medium';
		}elseif($count >= 9){
			$length = 'large';
		}elseif($count >= 11){
			$length = 'xlarge';
		}
		return $length;

	}
	public function SidebarBlocks(){

		$pages = $this->owner->Blocks()->filter(array('BlockArea' => 'Sidebar'));
		return $pages;

	}


	private function in_arrayi($needle, $haystack) {
	    return in_array(strtolower($needle), array_map('strtolower', $haystack));
	}

	public function autoCompleteResults($data, $form, $request) {
        $data = array(
            'Results' => $form->getResults(),
            'Query' => $form->getSearchQuery(),
            'Title' => _t('SearchForm.SearchResults', 'Search Results')
        );
        return $this->owner->customise($data)->renderWith(array('Page_results', 'Page'));
    }
	public function autoComplete($request){

		$keyword = trim( $request->requestVar( 'query' ) );

		$keyword = Convert::raw2sql( $keyword );

		$pages = new ArrayList();
		$pagesArray = array();

		$suggestions = array('suggestions' => array());

		$pages = SiteTree::get()->filterAny(array(
		    'Title:PartialMatch' =>  $keyword,
		    // 'Content:PartialMatch' => $keyword
		))->limit(5);


		//$pagesArray = $pages->map()->toArray();
		$pagesArray = $pages->column('Title');
		$suggestions['suggestions'] = $pagesArray;
		// if(!$this->in_arrayi($keyword, $pagesArray)){
		// 	array_unshift($pagesArray, $keyword);
		// }

		return json_encode($suggestions);

	}
	public function Header($theme = 'auto', $headerType = 'full'){
		$template = new SSViewer('Includes/Header');
		$siteConfig = SiteConfig::current_site_config();
		
		
		//If the page type forces a particular dark/light scheme (eg homepage), defer to that first.
		if($theme == 'auto'){
			if($this->owner->pageTypeTheme){
				$theme = $this->owner->pageTypeTheme;
				

			//Check page's individual CMS setting:
			}elseif($this->owner->UseDarkThemeOnThisPage){

				$theme = 'dark-header';
			//Otherwise, check global settings
			}elseif($siteConfig->UseDarkTheme){
				$theme = 'dark-header';

			//default to light if all else fails:
			}else{
				$theme = 'light-header';
			}
		}


		return $template->process($this->owner->customise(new ArrayData(array(
			'DarkLight' => $theme,
			'HeaderType' => $headerType
		))));
	}



}


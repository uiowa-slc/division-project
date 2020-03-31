<?php

use SilverStripe\Admin\CMSMenu;
use SilverStripe\Admin\LeftAndMainExtension;
use SilverStripe\SiteConfig\SiteConfig;


class CmsCustomLinkExtension extends LeftAndMainExtension
{

    public function init()
    {

        $config = SiteConfig::current_site_config(); 

        if(!$config->CmsCustomLinkUrl){
            return;
        }



        // unique identifier for this item. Will have an ID of Menu-$ID
        $id = 'CmsCustomLink';

        // your 'nice' title
        if($config->CmsCustomLinkTitle){
            $title = $config->CmsCustomLinkTitle; 
        }else{
            $title = 'Content Management Guide';
        }
        if($config->CmsCustomLinkClass){
            $iconClass = $config->CmsCustomLinkClass; 
        }else{
            $iconClass = 'font-icon-white-question';
        }        

        // the link you want to item to go to
        $link = $config->CmsCustomLinkUrl;

        // priority controls the ordering of the link in the stack. The
        // lower the number, the lower in the list
        $priority = -2;

        // Add your own attributes onto the link. In our case, we want to
        // open the link in a new window (not the original)
        $attributes = [
            'target' => '_blank',
        ];
//add_link(string $code, string $menuTitle, string $url, integer $priority = -1, array $attributes = null, string $iconClass = null)

        CMSMenu::add_link($id, $title, $link, $priority, $attributes, $iconClass);
    }
}
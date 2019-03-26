<?php

use SilverStripe\Control\Director;
use SilverStripe\i18n\i18n;
use SilverStripe\Core\Convert;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\ORM\DataExtension;
class OpenGraphExtension extends DataExtension {
    public static $keys = array(
        'title',
        'type',
        'image',
        'image:width',
        'image:height',
        'url',
        'description',
        'determiner',
        'locale',
        'locale:alternate',
        'site_name',
        'audio',
        'video',
        'video:width',
        'video:height',
        'video:secure_url',
        'video:type'
    );

    private static $casting = [
        "OpenGraph" => 'HTMLText',
    ];

    private function getCanonicalURL($url) {
        return Director::protocolAndHost() . $url;
    }
    public function getOpenGraph_type() {

        return 'website';
    }
    public function getOpenGraph_locale() {
        return i18n::get_locale();
    }

    public function getOpenGraph_description() {
        $page = $this->owner->data();
        $tries = array(
            'OgDescription',
            'MetaDescription',
            'Content'
        );

        foreach($tries as $t) {
            $i = $page->hasValue($t);

            if($i){
                

                $content = $this->owner->obj($t)->LimitCharacters(300);
                $content = Convert::raw2att($content);
                return $content;
            }
        }

        return SiteConfig::current_site_config()->obj('Tagline');
  
    }
    public function getOpenGraph_site_name() {
        return SiteConfig::current_site_config()->Title;
    }
    public function getOpenGraphImage() {

        $page = $this->owner->data();
        $tries = array(
            'OgImage',
            'FeaturedImage',
            'MainImage',
            'HeaderImage',
            'Photo',
            'BackgroundImage',
        );
        //Try the above image fields
        foreach($tries as $t) {
            // echo $t;
            $i = $page::getSchema()->hasOneComponent($page, $t);
            // echo $i;
            if($i) {
                if($page->getComponent($t)->exists()){
                    // echo 'component exists: '.$i;
                    return $page->getComponent($t);
                }
            }
        }

        //If no images in the tries array were found, attempt to get the sitewide poster image:
        if(SiteConfig::current_site_config()->obj('PosterImage')->exists()){
            return SiteConfig::current_site_config()->obj('PosterImage');
        }

        return null;
    }
    
    public function getOpenGraph_image_height() {
        $im = $this->owner->getOpenGraphImage();
        if($im && $im->exists()) {
            return $im->Height;
        }
        return "630";
    }
    
    public function getOpenGraph_image_width() {
        $im = $this->owner->getOpenGraphImage();
        if($im && $im->exists()) {
            return $im->Width;
        }else{
            return "1200";
        }
    }
    
    public function getOpenGraph_image() {
        $im = $this->owner->getOpenGraphImage();
        if($im && $im->exists()) {
            return $this->getCanonicalURL($im->URL);
        }else{
            return Director::absoluteBaseURL()."resources/vendor/md/division-project/src/images/og-dsl.png";
        }
    }
    public function getOpenGraph_title() {
        if($this->owner->URLSegment == "home"){
            return SiteConfig::current_site_config()->Title;
        }else{
            return $this->owner->Title;
        }
        
    }
    public function getOpenGraph_url() {
        $page = $this->owner;
        return $this->getCanonicalUrl($page->XML_val('Link'));
    }
    public function getOpenGraph_determiner() {
        return null;
    }
    public function getOpenGraph_audio() {
        return null;
    }
    public function getOpenGraph_video() {
        return null;
    }
    public function getOpenGraph_video_width() {
        return null;
    }
    public function getOpenGraph_video_height() {
        return null;
    }
    public function getOpenGraph_video_type() {
        return null;
    }
    public function getOpenGraph_video_secure_url() {
        return null;
    }
    public function getOpenGraph_locale_alternate() {
        return null;
    }
    public function getOpenGraph() {
        $tags = '';

        $siteConfig = SiteConfig::current_site_config();

        foreach(OpenGraphExtension::$keys as $k) {

            $key = str_replace(':', '_', $k);
            $action = "getOpenGraph_$key";
            $val = $this->owner->$action();
            if($val) {
                $val = Convert::raw2att($val);
                $tags .= "<meta property=\"og:$k\" content=\"$val\" />\n";
            }
        }



        $tags.="<meta property=\"fb:app_id\" content=\"127918570561161\" />\n";
        $tags.='<meta name="twitter:card" content="summary_large_image" />'."\n";
        $tags.='<meta name="twitter:title" content="'.$this->getOpenGraph_title().'">'."\n";
        $tags.='<meta name="twitter:description" content="'.$this->getOpenGraph_description().'" />'."\n";

        if($image = $this->getOpenGraphImage()){
           $tags.='<meta name="twitter:image" content="'.$image->getAbsoluteURL().'" />'."\n"; 
        }
        
        $twitter = $siteConfig->getTwitterHandle();
        if($twitter){
            $tags.='<meta name="twitter:site" content="'.$twitter.'" />';
            $tags.='<meta name="twitter:creator" content="'.$twitter.'" />';
        }

        return $tags;
    }
}
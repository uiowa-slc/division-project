<?php

class TextBlock extends ContentBlock{
    
    private static $db = array(
        'ExternalLink' => 'Text',
        'RSSFeedLink' => 'Text'
    );

    private static $has_one = array(
        'Image' => 'Image',
        'LinkedPage' => 'SiteTree'
    );
	
    /**
     * If the singular name is set in a private static $singular_name, it cannot be changed using the translation files
     * for some reason. Fix it by defining a method that handles the translation.
     * @return string
     */
    public function singular_name()
    {
        return _t('TextBlock.SINGULARNAME', 'Text Block');
    }

    /**
     * If the plural name is set in a private static $plural_name, it cannot be changed using the translation files
     * for some reason. Fix it by defining a method that handles the translation.
     * @return string
     */
    public function plural_name()
    {
        return _t('TextBlock.PLURALNAME', 'Text Blocks');
    }
}
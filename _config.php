<?php


use SilverStripe\View\Parsers\ShortcodeParser;
use SilverStripe\ActiveDirectory\Authenticators\SAMLAuthenticator;
use SilverStripe\Security\Authenticator;
use SilverStripe\Forms\HTMLEditor\HtmlEditorConfig;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use SilverStripe\Control\Director;
use SilverStripe\Core\Environment;
\SilverStripe\ORM\Search\FulltextSearchable::enable();


if(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] == '2620:0:e50:6802::27' && $_SERVER['HTTP_X_KENNYDEVTOKEN'] == Environment::getEnv('SS_KENNYDEVTOKEN')) {
    Environment::setEnv('SS_ENVIRONMENT_TYPE', 'dev');
}


HtmlEditorConfig::get('cms')->insertButtonsBefore(
	'styleselect',
	'removeformat'
);

// tell the button which tags it may remove
HtmlEditorConfig::get('cms')->setOption(
	'removeformat_selector',
	'b,strong,em,i,span,ins'
);

//remove font->span conversion

HtmlEditorConfig::get('cms')->setOption(
	'convert_fonts_to_spans', 'false,'
);

HtmlEditorConfig::get('cms')->setOptions(array(
	'valid_elements' => "@[id|class|style|title],#a[id|rel|rev|dir|tabindex|accesskey|type|name|href|target|title|class],-strong/-b[class],-em/-i[class],-strike[class],-u[class],#p[id|dir|class|align|style],-ol[class],-ul[class],-li[class],br,img[id|dir|longdesc|usemap|class|src|border|alt=|title|width|height|align],-sub[class],-sup[class],-blockquote[dir|class],-table[border=0|cellspacing|cellpadding|width|height|class|align|summary|dir|id|style],-tr[id|dir|class|rowspan|width|height|align|valign|bgcolor|background|bordercolor|style],tbody[id|class|style],thead[id|class|style],tfoot[id|class|style],#td[id|dir|class|colspan|rowspan|width|height|align|valign|scope|style],-th[id|dir|class|colspan|rowspan|width|height|align|valign|scope|style],caption[id|dir|class],-h2[id|dir|class|align|style],-h3[id|dir|class|align|style],-h4[id|dir|class|align|style],-h5[id|dir|class|align|style],-h6[id|dir|class|align|style],hr[class],dd[id|class|title|dir],dl[id|class|title|dir],dt[id|class|title|dir],@[id,style,class],small",
	'extended_valid_elements' => "img[class|src|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|usemap],#iframe[src|name|width|height|align|frameborder|marginwidth|marginheight|scrolling],object[width|height|data|type],param[name|value],map[class|name|id],area[shape|coords|href|target|alt],i[class|aria-hidden]",
));

// TinyMCE cleanup on paste
HtmlEditorConfig::get('cms')->setOption('paste_auto_cleanup_on_paste', 'true');
HtmlEditorConfig::get('cms')->setOption('paste_remove_styles', 'true');
HtmlEditorConfig::get('cms')->setOption('paste_remove_styles_if_webkit', 'true');
HtmlEditorConfig::get('cms')->setOption('paste_strip_class_attributes', 'true');

HtmlEditorConfig::get('cms')->insertButtonsAfter('indent', 'blockquote');

HtmlEditorConfig::get('cms')->setOption('theme_advanced_blockformats', 'p,address,pre,h2,h3,h4,h5,h6');

TinyMCEConfig::get('cms')
    ->addButtonsToLine(1, 'styleselect')
    ->setOptions([
        'importcss_append' => true,
         'block_formats'=>'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Address=address;Pre=pre'
    ]);

ShortcodeParser::get()->register('flickr', array('FlickrShortcodeControllerExtension', 'FlickrShortcodeHandler'));
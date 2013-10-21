<?php 
Director::set_environment_type("dev");


SiteTree::add_extension('Page', 'DivisionPage');
ContentController::add_extension('Page_Controller', 'DivisionPage_Controller');

// add a button to remove formatting
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
'valid_elements' => "@[id|class|style|title],#a[id|rel|rev|dir|tabindex|accesskey|type|name|href|target|title|class],-strong/-b[class],-em/-i[class],-strike[class],-u[class],#p[id|dir|class|align|style],-ol[class],-ul[class],-li[class],br,img[id|dir|longdesc|usemap|class|src|border|alt=|title|width|height|align],-sub[class],-sup[class],-blockquote[dir|class],-table[border=0|cellspacing|cellpadding|width|height|class|align|summary|dir|id|style],-tr[id|dir|class|rowspan|width|height|align|valign|bgcolor|background|bordercolor|style],tbody[id|class|style],thead[id|class|style],tfoot[id|class|style],#td[id|dir|class|colspan|rowspan|width|height|align|valign|scope|style],-th[id|dir|class|colspan|rowspan|width|height|align|valign|scope|style],caption[id|dir|class],-h1[id|dir|class|align|style],-h2[id|dir|class|align|style],-h3[id|dir|class|align|style],-h4[id|dir|class|align|style],-h5[id|dir|class|align|style],-h6[id|dir|class|align|style],hr[class],dd[id|class|title|dir],dl[id|class|title|dir],dt[id|class|title|dir],@[id,style,class],small",
'extended_valid_elements' => "img[class|src|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|usemap],#iframe[src|name|width|height|align|frameborder|marginwidth|marginheight|scrolling],object[width|height|data|type],param[name|value],map[class|name|id],area[shape|coords|href|target|alt]"
));

// TinyMCE cleanup on paste
HtmlEditorConfig::get('cms')->setOption('paste_auto_cleanup_on_paste','true');
HtmlEditorConfig::get('cms')->setOption('paste_remove_styles','true');
HtmlEditorConfig::get('cms')->setOption('paste_remove_styles_if_webkit','true');
HtmlEditorConfig::get('cms')->setOption('paste_strip_class_attributes','true');
GD::set_default_quality(80);
ShortcodeParser::get()->register('blogfeed',array('Page_Controller','BlogFeedHandler'));
ShortcodeParser::get()->register('spotlight',array('Page_Controller','StaffSpotlightHandler'));
Object::add_extension("BlogEntry","BlogFieldExtension");
Object::add_extension("Page","WidgetExtension");

RecaptchaField::$public_api_key = '6LcjsAgAAAAAAD6MXE7QNLusIBMajgpfK_EWjL3C';
RecaptchaField::$private_api_key = '6LcjsAgAAAAAAD6MXE7QNLusIBMajgpfK_EWjL3C';

SpamProtectorManager::set_spam_protector('RecaptchaProtector');
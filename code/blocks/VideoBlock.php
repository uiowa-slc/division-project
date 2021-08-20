<?php

use SilverStripe\Forms\TextField;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\FieldList;
class VideoBlock extends BaseElement{

	private static $db = array(
		"YoutubeEmbed" => "Text",
		"VimeoEmbed" => "Text",
	);

	private static $has_one = array(


	);
    private static $table_name = 'VideoBlock';

    public function getType()
    {
        return 'Video Block';
    }

	function getCMSFields() {
		 $this->beforeUpdateCMSFields(function (FieldList $fields) {

		//$fields->removeByName("Title");

		$fields->addFieldToTab('Root.Main', new TextField("YoutubeEmbed","Youtube id: <a href='https://md.studentlife.uiowa.edu/assets/Uploads/youtubevideoid.jpg' target='_blank'>Help</a>"));
		$fields->addFieldToTab('Root.Main', new TextField("VimeoEmbed","Vimeo id: <a href='https://md.studentlife.uiowa.edu/assets/Uploads/3.png' target='_blank'>Help</a>"));
        });

        return parent::getCMSFields();
	}

}

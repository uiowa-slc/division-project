<?php
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class EmbedBlock extends BaseElement {

	private static $db = array(
		'EmbeddedURL' => 'Varchar(225)',
		'EmbedMethod' => 'Varchar(155)',
		'Title' => 'Text',
		'Width' => 'Varchar(11)',
		'Height' => 'Varchar(11)',
		'Shape' => "Varchar(155)",
		'LinkEmbedTo' => 'Varchar(155)',
		'LinkTitle' => 'Text',
	);

	private static $defaults = array(
		'Width' => '1280px',
		'Height' => '720px',

	);

	private static $has_one = array(
		'Image' => Image::class,
	);

	private static $owns = array(
		'Image',
	);

	private static $singular_name = 'Embed Block';
	private static $table_name = 'EmbedBlock';

	public function getType() {
		return 'Embed Block';
	}

	public function getCMSFields() {


        $this->beforeUpdateCMSFields(function (FieldList $fields) {

		$self = $this;

		$fields->push(CheckboxField::create('ShowTitle'));
		$fields->push(TextField::create('EmbeddedURL', 'Embed URL (include https://)'));
		$fields->push(DropdownField::create(
			'EmbedMethod',
			'Embed display',
			array(
				'automatic' => 'Automatic and responsive',
				'manual' => 'Manual height and width',
			)
		));
		$fields->push($shapeDropdown = DropdownField::create(
			'Shape',
			'Embed shape',
			array(
				'default' => 'Default (4:3)',
				'widescreen' => 'Widescreen',
				'vertical' => 'Vertical',
				'square' => 'Square',
				'panorama' => 'Panorama',
			)
		));
		$fields->push($widthField = TextField::create('Width', 'Width (examples: "1280px", "100%")'));
		$fields->push($heightField = TextField::create('Height', 'Height (examples: "720px", "100%")'));

		$shapeDropdown->displayIf('EmbedMethod')->isEqualTo('automatic');
		$widthField->displayIf('EmbedMethod')->isEqualTo('manual');
		$heightField->displayIf('EmbedMethod')->isEqualTo('manual');

		$fields->push(TextField::create('LinkEmbedTo', 'Link to this URL')->setDescription('Optional. Could be the Instagram account, video link, etc.'));

		$fields->push(TextField::create('LinkTitle', 'Link title')->setDescription('Optional. Could be the Instagram account, etc.'));
		$fields->push(UploadField::create('Image', 'Title icon or image for the link')->setDescription('Optional. Could be the Instagram account image, or another representative image'));

        });

        return parent::getCMSFields();
	}

}

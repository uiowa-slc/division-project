<?php

use SilverStripe\ORM\DataExtension;


class DivisionEmailRecipientExtension extends DataExtension {


	public function updateCMSFields(SilverStripe\Forms\FieldList $fields){
		//removing email from, since we can only email from imu-web
		$fields->removeByName('EmailFrom');
	}

}

<?php

	class ActiveDirectoryMemberExtension extends DataExtension {

		private static $db = array (
			'silverstripeRoles' => 'Text'
		);


		public function onBeforeWrite(){

			$silverstripeRoles = $this->owner->obj('silverstripeRoles')->getValue();
			$adminGroup = Group::get()->filter(array('Title' => 'Administrators'))->First();
			$contentEditorsGroup = Group::get()->filter(array('Title' => 'Content Authors'))->First();
			if($silverstripeRoles){
				if(strpos('IMU-MD-WEB-ADMINS',$silverstripeRoles) !== false){
					$adminGroup->Members()->add($this->owner);
				}elseif(strpos('IMU-MD-WEB-EDITORS', $silverstripeRoles) !== false){
					$contentEditorsGroup->Members()->add($this->owner);
				}else{
					$adminGroup->Members()->remove($this->owner);
					$contentEditorsGroup->Members()->remove($this->owner);
				}
			}


		}


	}
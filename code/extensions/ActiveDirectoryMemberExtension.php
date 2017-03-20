<?php

	class ActiveDirectoryMemberExtension extends DataExtension {

		private static $db = array (
			'silverstripeRoles' => 'Text'
		);


		public function onBeforeWrite(){

			$silverstripeRoles = $this->owner->obj('silverstripeRoles')->getValue();
			$adminGroup = Group::get()->filter(array('Title' => 'Administrators'))->First();
			$contentEditorsGroup = Group::get()->filter(array('Title' => 'Content Authors'))->First();
			$guid = $this->owner->obj('GUID')->getValue();
			$email = $this->owner->obj('Email')->getValue();




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


			//if(!$guid){
				$guidLookup = $this->lookupGuid($email);
				if($guidLookup){
					$this->owner->GUID = $guidLookup;
				}
			//}


		}

		private function lookupGuid($email){
			set_time_limit(30);

			$ldapserver = 'iowa.uiowa.edu';
			$ldapuser      =  AD_SERVICEID_USER;  
			$ldappass     = AD_SERVICEID_PASS;
			$ldaptree    = "DC=iowa, DC=uiowa, DC=edu";

			$ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");

			if($ldapconn) {
			    // binding to ldap server
			    ldap_set_option( $ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3 );
			    ldap_set_option( $ldapconn, LDAP_OPT_REFERRALS, 0 );
			    $ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die ("Error trying to bind: ".ldap_error($ldapconn));
			    // verify binding
			    if ($ldapbind) {

			    	//do stuff
						$result = ldap_search($ldapconn,$ldaptree, "mail=".$email, array("mail","objectGUID", "memberOf")) or die ("Error in search query: ".ldap_error($ldapconn));
						
			        	$data = ldap_get_entries($ldapconn, $result);
			        	//print_r($data);
			        	if($data["count"] == 1){
			        		$memberGuid = $this->GUIDtoStr($data[0]["objectguid"][0]);
			        		// echo "<p>Found a GUID (".$memberGuid.") matching the email <strong>".$member->Email."</strong>, adding it to the local member's GUID field.</p>";
			        		return $memberGuid;
			        		// echo "<p><strong>Done.</strong></p>";
			        	}


			    } else {
			        echo "LDAP bind failed...";
			    }
			}
			// all done? clean up
			ldap_close($ldapconn);
		}

		private function GUIDtoStr($binary_guid) {
		  $unpacked = unpack('Va/v2b/n2c/Nd', $binary_guid);
		  return sprintf('%08X-%04X-%04X-%04X-%04X%08X', $unpacked['a'], $unpacked['b1'], $unpacked['b2'], $unpacked['c1'], $unpacked['c2'], $unpacked['d']);
		}

	}
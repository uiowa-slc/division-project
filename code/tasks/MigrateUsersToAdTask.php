<?php

	class MigrateUsersToAdTask extends BuildTask {


		protected $title = 'Migrate existing users to AD users';
		protected $description = 'Loops through all existing SS users and matches them to GUIDs on AD';

		protected $enabled = true;

		function GUIDtoStr($binary_guid) {
		  $unpacked = unpack('Va/v2b/n2c/Nd', $binary_guid);
		  return sprintf('%08X-%04X-%04X-%04X-%04X%08X', $unpacked['a'], $unpacked['b1'], $unpacked['b2'], $unpacked['c1'], $unpacked['c2'], $unpacked['d']);
		}

		function run($request){
			set_time_limit(30);
			error_reporting(E_ALL);
			ini_set('error_reporting', E_ALL);
			ini_set('display_errors',1);

			// config
			$ldapserver = 'iowa.uiowa.edu';
			$ldapuser      =  AD_SERVICEID_USER;  
			$ldappass     = AD_SERVICEID_PASS;
			$ldaptree    = "DC=iowa, DC=uiowa, DC=edu";

			// connect 
			$ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");

			if($ldapconn) {
			    // binding to ldap server
			    ldap_set_option( $ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3 );
			    ldap_set_option( $ldapconn, LDAP_OPT_REFERRALS, 0 );
			    $ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die ("Error trying to bind: ".ldap_error($ldapconn));
			    // verify binding
			    if ($ldapbind) {
			        echo "LDAP bind successful...<br /><br />";
			        

			        $members = Member::get();

			        foreach($members as $member){
			        	echo '<hr />';
			        	echo '<h2>Working on user: '.$member->Email.'</h2>';
			        	$result = ldap_search($ldapconn,$ldaptree, "mail=".$member->Email, array("mail","objectGUID")) or die ("Error in search query: ".ldap_error($ldapconn));
			        	$data = ldap_get_entries($ldapconn, $result);

			        	if($data["count"] == 1){
			        		$memberGuid = $this->GUIDtoStr($data[0]["objectguid"][0]);
			        		echo "<p>Found a GUID (".$memberGuid.") matching the email <strong>".$member->Email."</strong>, adding it to the local member's GUID field.</p>";
			        		$member->Password = '';
			        		$member->GUID = $memberGuid;
			        		$member->write();
			        		echo "<p><strong>Done.</strong></p>";
			        	}elseif($data["count"] == 0){
			        		echo "<p>No results found for <strong>".$member->Email."</strong>.</p>";
			        	}elseif($data["count" > 1]){
			        		echo "<p>Multiple results found for <strong>".$member->Email."</strong>, so I'm going to skip it because this is weird and unexpected.</p>";
			        	}
			       	}

			    } else {
			        echo "LDAP bind failed...";
			    }

			}
			// all done? clean up
			ldap_close($ldapconn);
	}

	}
<?php

use SilverStripe\ORM\ArrayList;
use SilverStripe\Security\Member;
use SilverStripe\ORM\DataObject;
use MD\DivisionProject\StudentLifeNewsEntryController;

class StudentLifeNewsEntry extends DataObject {

	private static $db = array(
		'Title' => 'Text',
		'Content' => 'HTMLText',
		'URLSegment' => 'Varchar',
		'PublishDate' => 'Datetime',
		'ParentID' => 'Int',
		'IsFeatured' => 'Boolean',
		'ExternalURL' => 'Varchar(255)',
		'CanonicalURL' => 'Varchar(255)',
		'FeaturedImageURL' => 'Varchar'
	);

	private static $has_many = array(
	);

	private static $allowed_children = array(

	);
	private static $default_sort = 'PublishDate DESC';
	private static $singular_name = 'News Entry';

	private static $plural_name = 'News Entries';

	private static $hide_ancestor = 'StudentLifeNewsEntry';

	public function getCMSFields() {
		$f = parent::getCMSFields();
		return $f;
	}


	// function setExternalURL($URL) {
	// 	return $this->setField('ExternalURL', $this->validateURL($URL));
	// }

	public function Link() {

		$parent = StudentLifeNewsHolder::get()->byID($this->ParentID);

		if($parent){
			return $parent->Link('post/'.$this->URLSegment);
		}else{
			return $this->CanonicalURL;
		}

		
	}

	public function createFromArray($array){

		$entry = $this;

		//volatile. TODO: make less volatile for more than one sl news holder
		$parent = StudentLifeNewsHolder::getOrCreate();


		$entry->Title = $array['Title'];
		$entry->URLSegment = $array['URLSegment'];
		$entry->ParentID = $parent->ID;
		$entry->Content = $array['Content'];

		$entry->FeaturedImageURL = $array['FeaturedImage'];


		$entry->PublishDate = $array['PublishDate'];


		$entry->Tags = $this->getTagsFromArray($array['Tags']);
		$entry->Authors = $this->getAuthorsFromArray($array['Authors']);

		$entry->StoryBy = $array['StoryBy'];
		$entry->StoryByEmail = $array['StoryByEmail'];
		$entry->StoryByTitle = $array['StoryByTitle'];
		$entry->StoryByDept = $array['StoryByDept'];
		$entry->PhotosBy = $array['PhotosBy'];
		$entry->PhotosByEmail = $array['PhotosByEmail'];
		$entry->ExternalURL = $array['ExternalURL'];
		$entry->CanonicalURL = $array['CanonicalURL'];

		return $entry;

	}

	public function AbsoluteLink(){
		return $this->CanonicalURL;
	}

	private function getTagsFromArray($array){
		$list = new ArrayList();
		foreach($array as $tagArray){
			$newTag = StudentLifeNewsTag::createFromArray($tagArray);
			$newTag->ParentID = $this->ParentID;
			$list->push($newTag);
		}
		return $list;
	}

	private function getAuthorsFromArray($array){
		$list = new ArrayList();
		foreach($array as $authorArray){
			$newAuthor = StudentLifeNewsAuthor::createFromArray($authorArray);
			$newAuthor->ParentID = $this->ParentID;
			$list->push($newAuthor);
		}
		return $list;

	}
	public function onBeforeWrite() {
	    // check on first write action, aka 'database row creation' (ID-property is not set)
	    if(!$this->isInDb()) {

	    }

	    $authorEmails = $this->StoryByEmail;
	    $authorEmailsArray = explode(',', $authorEmails);

	    $this->Authors()->removeAll();

	    foreach ($authorEmailsArray as $email){
	    	$email = trim($email);
	    	if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
	  			// echo('$email is a valid email address');
	  			if (Member::get()->filter(array('Email' => $email))->First()){
	  				$author = Member::get()->filter(array('Email' => $email))->First();
	  				$this->Authors()->add($author);
	  			}
	  			else{
	  				$userLookup = $this->lookupUser($email);
					if($userLookup){
						$m = new Member();
						$m->FirstName = $userLookup['firstName'];
						$m->Surname = $userLookup['lastName'];
						$m->Email = $email;
						$m->GUID = $userLookup['guid'];
						$m->write();
						$this->Authors()->add($m);
					}
	  			}
			}

	    }
	    // CAUTION: You are required to call the parent-function, otherwise
	    // SilverStripe will not execute the request.
	    parent::onBeforeWrite();
  }
  public function lookupUser($email){
		set_time_limit(30);

		$ldapserver = 'iowa.uiowa.edu';
		$ldapuser      =  AD_SERVICEID_USER;
		$ldappass     = AD_SERVICEID_PASS;
		$ldaptree    = 'DC=iowa, DC=uiowa, DC=edu';

		$ldapconn = ldap_connect($ldapserver) or die('Could not connect to LDAP server.');

		if($ldapconn) {
		    // binding to ldap server
		    ldap_set_option( $ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3 );
		    ldap_set_option( $ldapconn, LDAP_OPT_REFERRALS, 0 );
		    $ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die ('Error trying to bind: '.ldap_error($ldapconn));
		    // verify binding
		    if ($ldapbind) {

		    	//do stuff
					$result = ldap_search($ldapconn,$ldaptree, 'mail='.$email, array('mail','sn', 'givenName', 'objectGUID', 'memberOf')) or die ('Error in search query: '.ldap_error($ldapconn));

		        	$data = ldap_get_entries($ldapconn, $result);
		        	//print_r($data[0]);
		        	if($data['count'] == 1){
		        		$memberGuid = $this->GUIDtoStr($data[0]['objectguid'][0]);
		        		$resultArray['guid'] = $memberGuid;
		        		$resultArray['firstName'] = $data[0]['givenname'][0];
		        		$resultArray['lastName'] = $data[0]['sn'][0];
		        		// echo '<p>Found a GUID ('.$memberGuid.') matching the email <strong>'.$member->Email.'</strong>, adding it to the local member's GUID field.</p>';
		        		//print_r($resultArray);
		        		return $resultArray;
		        		// echo '<p><strong>Done.</strong></p>';
		        	}


		    } else {
		        echo 'LDAP bind failed...';
		    }
		}
		// all done? clean up
		ldap_close($ldapconn);
	}

	public function GUIDtoStr($binary_guid) {
	  $unpacked = unpack('Va/v2b/n2c/Nd', $binary_guid);
	  return sprintf('%08X-%04X-%04X-%04X-%04X%08X', $unpacked['a'], $unpacked['b1'], $unpacked['b2'], $unpacked['c1'], $unpacked['c2'], $unpacked['d']);
	}
}

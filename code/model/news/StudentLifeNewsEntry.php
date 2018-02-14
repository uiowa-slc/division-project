<?php
class StudentLifeNewsEntry extends DataObject {

	private static $db = array(
		'Title' => 'Text',
		'Content' => 'HTMLText',
		'URLSegment' => 'Varchar',
		'PublishDate' => 'SS_Datetime',
		'ParentID' => 'Int',
		'IsFeatured' => 'Boolean',
		'ExternalURL' => 'Varchar(255)',
		'FeaturedImageURL' => 'Varchar',
		'StudentLifeID' => 'Int'
	);

	private static $casting = array(
		'FeaturedImage' => 'Image'
	);

	private static $has_many = array(
	);

	private static $allowed_children = array(

	);
	private static $default_sort = 'PublishDate DESC';
	private static $singular_name = 'News Entry';

	private static $plural_name = 'News Entries';

	public function getCMSFields() {
		$f = parent::getCMSFields();
		return $f;
	}


	// function setExternalURL($URL) {
	// 	return $this->setField('ExternalURL', $this->validateURL($URL));
	// }

	public function Link() {
		$parent = StudentLifeNewsHolder::get()->byID($this->ParentID);
		return $parent->Link('post/'.$this->URLSegment);
	}

	public function createFromArray($array){

		$entry = $this;
		$parent = StudentLifeNewsHolder::get()->filter(array('URLSegment' => 'news'))->First();

		$entry->StudentLifeID = $array['StudentLifeID'];
		$entry->Title = $array['Title'];
		$entry->URLSegment = $array['URLSegment'];
		
		$entry->Content = $array['Content'];

		$entry->FeaturedImageURL = $array['FeaturedImage'];


		$entry->PublishDate = $array['PublishDate'];

		// $entry->Image = $array['FeaturedImage'];


		

		//TODO: Tags import

		// echo '<ul>';
		// if(count($array['Tags']) > 0){
		// 	echo '<li>Found tags: ';
		// 	$newTagCandidates = $array['Tags'];

		// 	foreach($newTagCandidates as $newTagCandidate){
		// 		echo $newTagCandidate.', ';
		// 	}

		// 	foreach($newTagCandidates as $newTagCandidate){
		// 		$newTagCandidate = trim($newTagCandidate);
		// 		echo 'Converting tag <strong>'.$newTagCandidate.'</strong>...';
		// 		$existingTag = BlogTag::get()->filter(array('Title' => $newTagCandidate))->First();


		// 		if($existingTag){
		// 			echo 'Existing tag <strong>'.$existingTag->Title.'</strong> found in database, adding post to this tag. ';

		// 			$entry->Tags()->add($existingTag);
		// 		}else{
		// 			echo 'No equivalent tag found, creating a new tag <strong>'.$newTagCandidate.'</strong>';
		// 			$newTag = BlogTag::create();
		// 			$newTag->Title = $newTagCandidate;
		// 			$newTag->BlogID = $parent->ID;
		// 			$newTag->write();
					
		// 			$entry->Tags()->add($newTag);
		// 		}
		// 	echo '</li>';

		// 	}

			
		// }else{
		// 	echo '<li>No tags on this post.</li>';
		// }
		// echo '</ul>';		


		$entry->StoryBy = $array['StoryBy'];
		$entry->StoryByEmail = $array['StoryByEmail'];
		$entry->StoryByTitle = $array['StoryByTitle'];
		$entry->StoryByDept = $array['StoryByDept'];
		$entry->PhotosBy = $array['PhotosBy'];
		$entry->PhotosByEmail = $array['PhotosByEmail'];
		$entry->ExternalURL = $array['ExternalURL'];


		return $entry;




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
class StudentLifeNewsEntry_Controller extends BlogEntry_Controller {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array(
	);

	public function RelatedNewsEntries() {
		$holder = StudentLifeNewsHolder::get()->First();
		$tags = $this->TagsCollection()->sort("RAND()")->limit(6);
		$entries = new ArrayList();

		foreach ($tags as $tag) {
			$taggedEntries = $holder->Entries(5, $tag->Tag)->exclude(array("ID" => $this->ID))->sort("RAND()")->First();
			if ($taggedEntries) {
				foreach ($taggedEntries as $taggedEntry) {
					if ($taggedEntry->ID) {
						$entries->push($taggedEntry);
					}
				}
			}

		}

		if ($entries->count() > 1) {
			$entries->removeDuplicates();
		}
		return $entries;
	}

	public function init() {
		parent::init();

	}

}
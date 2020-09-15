<?php
use SilverStripe\ORM\DataObject;

class StaffPronoun extends DataObject {

    private static $db = array(
        'Pronoun' => 'Varchar(128)',
        //'SortOrder' => 'Int'
    );

    private static $default_records = array(
        ['Pronoun' => 'He, him, his'],
        ['Pronoun' => 'She, her, hers'],
        ['Pronoun' => 'They, them, theirs'],
        ['Pronoun' => 'Ze, hir, hirs'],
        ['Pronoun' => 'Ze, zir, zirs'],
    );

    // Possible TODO implement custom sort table
    //private static $many_many = array(
    //	'PronounSortOrder' => 'PronounSortOrder',
    //);

    // Tie back into StaffPages
    private static $many_many = array(
        'StaffPages' => 'StaffPage',
    );

    // Restrict fields available to views
    private static $summary_fields = array(
        'Pronoun' => 'Pronoun',
    );

    // Possible TODO set default sort order
    private static $default_sort = array(
    	'Pronoun ASC'
    );

    // Possible TODO do we need this??
    //public function SortedStaffPages(){
    //	$staffPages = $this->StaffPages()->sort('Sort');
    //	$this->extend('alterSortedStaffPages', $staffPages);
    //	return $staffPages;
    //}

}

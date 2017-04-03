<?php

class Topic extends BlogPost {

	

    public function AllTags()
    {
        //$blog = $this;
        $tags = BlogTag::get()->filter(array('BlogID' => $this->ParentID))->sort('Title ASC');
        return $tags;
    }


}


class Topic_Controller extends BlogPost_Controller{



}
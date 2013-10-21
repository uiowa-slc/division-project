<?php
class ImageBlurbWidget extends Widget {
    private static $db = array(
        "Heading" => "Text",
        "ShowHeading" => "Boolean"
    );

    private static $has_one = array(

        "Image" => "Image",
        "PageToLink" => "SiteTree",


    );


    private static $defaults = array(
       
    );

    private static $title = "Blurb with Image Widget";
    private static $cmsTitle = "Blurbs with Images";
    private static $description = "Shows a blurb about a page or link on this site or elsewhere.";


    public function getCMSFields() {
        return new FieldList(
            new TextField("Heading"),
            new CheckboxField("ShowHeading", "Show the heading"),
            new UploadField("Image", "Image"),
            new TreeDropdownField("PageToLink", "Page to link to", "SiteTree")
            //new NumericField("NumberToShow", "Number to Show")
        );
    }
}
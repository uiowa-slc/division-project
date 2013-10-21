<?php
class SideNewsWidget extends Widget {
    private static $db = array(
        "NumberToShow" => "Int"
    );


    private static $defaults = array(
        "NumberToShow" => 4
    );

    private static $title = "Side News Widget";
    private static $cmsTitle = "Side News Items";
    private static $description = "Shows Side News Items";


    public function getCMSFields() {
        return new FieldList(
            new NumericField("NumberToShow", "Number to Show")
        );
    }
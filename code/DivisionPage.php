<?php
class DivisionPage extends DataExtension {

	private static $db = array(
		
	);

	private static $has_one = array(
		"BackgroundImage" => "Image",
	);


	private static $many_many = array (
		"SidebarItems" => "SidebarItem"
	);

    private static $many_many_extraFields=array(
        'SidebarItems'=>array(
            'SortOrder'=>'Int'
        )
    );



    private static $plural_name = "Pages";

	private static $defaults = array (


		"Content" =>
			"<h1>H1. This is a very large header.</h1>
<p>The first paragraph directly after an H1 is the lede paragraph and is styled with a larger font size than other paragraphs.</p>
<h2>H2. This is a large header.</h2>
<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient.</p>
<h3>H3. This is a medium header.</h3>
<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh ut fermentum massa justo.</p>
<h4>H4. This is a moderate header.</h4>
<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl.</p>
<h5>H5. This is small header.</h5>
<p>Cum sociis natoque penatibus magnis parturient montes, nascetur ridiculus mus. Sed consectetur est.</p>
<h6>H6. This is very small header.</h6>
<p>Donec id elit non mi porta gravida at eget metus. Curabitur blandit tempus porttitor.</p>"

	);


public function updateCMSFields(FieldList $f) {

		$f->addFieldToTab("Root.Main", new UploadField("BackgroundImage", "Background Image"), "Content");
		

		$gridFieldConfig = GridFieldConfig_RelationEditor::create();
		
		$row = "SortOrder";
		$gridFieldConfig->addComponent($sort = new GridFieldSortableRows(stripslashes($row))); 
		//$gridFieldConfig->addComponent(new GridFieldManyRelationHandler(), 'GridFieldPaginator');
		$sort->table = 'Page_SidebarItems'; 
		$sort->parentField = 'PageID'; 
		$sort->componentField = 'SidebarItemID'; 

		$gridField = new GridField("SidebarItems", "Sidebar Items", $this->SidebarItems(), $gridFieldConfig);
		$f->addFieldToTab("Root.Sidebar", new LabelField("SidebarLabel", "<h2>Add sidebar items below</h2>"));
		$f->addFieldToTab("Root.Sidebar", new LiteralField("SidebarManageLabel", '<p><a href="admin/sidebar-items" target="_blank">View and Manage Sidebar Items &raquo;</a></p>'));
		$f->addFieldToTab("Root.Sidebar", $gridField); // add the grid field to a tab in the CMS
		//$f->addFieldToTab("Root.Widgets", new WidgetAreaEditor("MyWidgetArea"));

	}


    public function SidebarItems() {
        return $this->owner->getManyManyComponents('SidebarItems')->sort('SortOrder');
    }
	
}

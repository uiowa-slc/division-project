<% include MainContentHeader %>

$BeforeContent

<div class="row">

    <% if $HideSideNav %>
        <div class="main-content main-content--with-padding main-content--full-width">
    <% else %>
	   <div class="main-content main-content--with-padding <% if $SiteConfig.ShowExitButton %>main-content--with-exit-button-padding<% end_if %> <% if $Children || $Menu(2) || $SidebarArea.Elements ||  $SidebarView.Widgets %>main-content--with-sidebar <% else %>main-content--full-width<% end_if %>">
    <% end_if %>
	$BeforeContentConstrained
	<% if $MainImage %>
		<img class="main-content__main-img" src="$MainImage.ScaleMaxWidth(500).URL" alt="" role="presentation"/>
	<% end_if %>
	<div class="main-content__text">
        <% if $OrganizationalUnit %><p class="header--small">$OrganizationalUnit</p><% end_if %>
		$Content
        $AfterContentConstrained
        $Form
	</div>
	<% if $ShowChildPages %>
		<% include ChildPages %>
	<% end_if %>
	</div>
    <% if not $HideSideNav %>
        <% if $Children || $Menu(2) || $SidebarArea.Elements ||  $SidebarView.Widgets %>
        	<aside class="sidebar dp-sticky">
        		<% include SideNav %>
        		<% if $SideBarView %>
        			$SideBarView
        		<% end_if %>
        		$SidebarArea
        	</aside>
        <% end_if %>
    <% end_if %>
</div>
$AfterContent

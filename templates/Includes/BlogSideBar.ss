<aside>
	<% include SideBarSearch %>
	<% if $SideBarView %>
	<div id="blog-sidebar">
		$SideBarView
	</div>
	<% end_if %>
	
	<% if SidebarItems %>
			<% loop SidebarItems %>
				<% include SidebarItem %>
			<% end_loop %>
	<% end_if %>
</aside>
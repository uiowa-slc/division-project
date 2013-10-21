<aside>
	<div id="blog-sidebar">
		$SideBarView
	</div>
	
	<% if SidebarItems %>
			<% loop SidebarItems %>
				<% include SidebarItem %>
			<% end_loop %>
	<% end_if %>
</aside>
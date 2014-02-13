<aside>
	<% include SideBarSearch %>
	<div id="blog-sidebar">
		$Parent.SideBarView
		$SideBarView
	</div>
	
	<% if SidebarItems %>
			<% loop SidebarItems %>
				<% include SidebarItem %>
			<% end_loop %>
	<% end_if %>
</aside>
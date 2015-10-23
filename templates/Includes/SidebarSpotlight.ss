<div class="faces">
	<% with BlogPage %>
	<a href="$Link">
		<div class="faces-image-container">
			<h3>$Title</h3>
			<% if $FeaturedImage %><img src="division-project/images/placeholder-sidebar.png" data-src="$FeaturedImage.SetWidth(279).URL" alt="An image representing $Title"><% end_if %>
		</div>
	</a>
	<% end_with %>
</div>

<p>$SidebarContent</p>
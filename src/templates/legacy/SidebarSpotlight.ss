<div class="faces">
	<% with BlogPage %>
	<a href="$Link">
		<div class="faces-image-container">
			<h3>$Title</h3>
			<% if $FeaturedImage %><img src="division-project/images/placeholder-sidebar.png" data-src="$FeaturedImage.ScaleWidth(279).URL" role="presentation" alt=""><% end_if %>
		</div>
	</a>
	<% end_with %>
</div>

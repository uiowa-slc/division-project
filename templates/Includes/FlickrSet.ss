<% if $Photos %>
	<% if $Type == "slideshow" %>
		<% if $Photoset %>
			<iframe class="flickr-slideshow" src="https://www.flickr.com/photos/{$FlickrUser}/{$Photos.First.ID}/in/set-{$Photoset.ID}/player/" width="100%" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
		<% else %>
			<div class="flexslider">
				<ul class="slides">
					<% loop $Photos %>
					<li><a href="$Large1024Url"><img src="$Medium800Url" alt="$Title"></a></li>
					<% end_loop %>
				</ul>
			</div>
		<% end_if %>
	<% else_if $Type == "gallery" %>
		<ul class="large-block-grid-{$Columns} slideshow-container">
			<% loop $Photos %>
				<li>
					<p><a href="$Large1024Url" title="$Description"><img data-src="$Medium800Url" src="<% include PlaceholderLargeSrc %>" /></a></p>
					<% if $Description || $Title %><p><% if $Title %><strong>$Title</strong><br /><% end_if %> <% if $Description %>$Description<% end_if %></p><% end_if %></div>
				</li>
			<% end_loop %>
		</ul>
	<% else_if $Type == "grid" %>
		<div class="slideshow-grid-container">
			<% loop $Photos %>
				<div class="slideshow-grid-item slideshow-grid-item--width{$Up.Columns} <% if $MultipleOf(5) %>slideshow-grid-item--width4<% end_if %>"><p><a href="$Large1024Url" title="$Description"><img src="$Medium800Url" alt="$Description" /></a></p>
				<% if $Description || $Title %><p><% if $Title %><strong>$Title</strong><br /><% end_if %> <% if $Description %>$Description<% end_if %></p><% end_if %></div>
			<% end_loop %>
		</div>
	<% end_if %>
<% end_if %>

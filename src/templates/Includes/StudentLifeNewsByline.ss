<div class="blogmeta__byline">
	<p><% if $Authors %>
		<em class="byline__by">By </em>
		<% end_if %>
		<% loop $Authors %>
			<% if not $First && not $Last %>, <% end_if %>
			<% if not $First && $Last %><span class="byline__and"> and </span><% end_if %>
			
				<a href="$Link" class="byline__author">
				<% if $ImageURL %> 
					<img src="$ImageURL" alt="" role="presentation">
				<% end_if %> 
				$Name.XML
			</a>
		<% end_loop %>


</div>
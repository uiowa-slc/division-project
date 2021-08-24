<div class="blogmeta__byline">
	<p><% if $Authors %>
		<span class="byline__by">By </span>
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
            <% if not $Authors && not $StoryBy %><span class="byline__on">Posted on</em> <% else %><span class="byline__on">on </span><% end_if %><time datetime="$PublishDate.format(c)" itemprop="datePublished">$PublishDate.format("MMMM d, y")</time> <% if $PhotosBy %><em class="blogmeta__media">Media by</span> <% if $PhotosByEmail %><a href="mailto:$PhotosByEmail">$PhotosBy</a><% else %>$PhotosBy<% end_if %><% end_if %></p>

</div>

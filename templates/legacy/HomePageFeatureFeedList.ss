<% if $FeedItems %>
	<div class="feed-list">
		<% loop $FeedItems.Limit(4) %>
			<div class="feed-item">
				<h4><a href="$Link" target="_blank">  $Title </a></h4>
				<p><a target="_blank" href="$Link">Continue Reading</a></p>
			</div>
		<% end_loop %>
	</div>
<% end_if %>
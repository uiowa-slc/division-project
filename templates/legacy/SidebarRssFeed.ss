
<ul class="feed-nav">
	<% loop FeedItems %>
		<li>
			<a href="$Link" target="_blank">$Title</a>
			<p class="posted-on">posted on $Date.Format(F j) <!--- by $Author ---></p>
	
		</li>
	<% end_loop %>
</ul>

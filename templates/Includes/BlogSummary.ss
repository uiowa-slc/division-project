<div class="blogSummary">
	<% if $FeaturedImage %>
		<a href="$Link" class="blog-featured-image"><img src="$FeaturedImage.URL" role="presentation" alt="" /></a>
	<% end_if %>
	<h2 class="postTitle">
		<% if $ExternalURL %><a href="$ExternalURL" target="_blank" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'">$MenuTitle</a>

		<% else %>
			<a href="$Link" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'">$MenuTitle</a>
		<% end_if %>
	</h2>
	<p>$Content.Summary(50)<% if $ExternalURL %><a href="$ExternalURL" target="_blank"><% else %>
	<a href="$Link"><% end_if %>Continue reading...</a></p>
	<% include BlogByline %>

</div>
<hr>

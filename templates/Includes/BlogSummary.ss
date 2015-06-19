<div class="blogSummary">
	<h3 class="postTitle">
		<% if $ExternalURL %><a href="$ExternalURL" target="_blank" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'">$MenuTitle</a>

		<% else %>
			<a href="$Link" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'">$MenuTitle</a>
		<% end_if %>
	</h3>
	<p>$Content.Summary(50)<% if $ExternalURL %><a href="$ExternalURL" target="_blank">
	<a href="$Link"><% end_if %> Read Full Post</a></p>
	<% include BlogByline %>

</div>
<hr>

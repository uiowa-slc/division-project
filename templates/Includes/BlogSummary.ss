<div class="blogSummary">
	<h3 class="postTitle">
		<% if $ExternalURL %><a href="$ExternalURL" target="_blank" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'">$MenuTitle</a>

		<% else %>
			<a href="$Link" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'">$MenuTitle</a>
		<% end_if %>
	</h3>

	<% if BlogHolder.ShowFullEntry %>
		$Content
	<% else %> 
		<p>$Content.LimitWordCount(30) <a href="$Link">Read Full Post</a></p>
	<% end_if %>

	<% if $Date %><p class="authorDate"><% _t('POSTEDON', 'Posted on') %> $Date.Long</p><% end_if %>

	<!-- <% if TagsCollection %>
		<p class="tags-summary">
			Tags:
			<% loop TagsCollection %>
				<a href="$Link" title="View all posts tagged '$Tag'" rel="tag">$Tag</a><% if not Last %>,<% end_if %>
			<% end_loop %>
		</p>
	<% end_if %> -->

</div>
<hr>

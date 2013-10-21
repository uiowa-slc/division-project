<div class="blogSummary">
	<h3 class="postTitle"><a href="$Link" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'">$MenuTitle</a></h3>

	<% if BlogHolder.ShowFullEntry %>
		$Content
	<% else %> 
		<p>$Content.LimitWordCount(30) <a href="$Link">Read Full Post</a></p>
	<% end_if %>
	
	<!-- <p class="post-link"><a href="$Link" class="readmore btn" title="Read Full Post">Read the full post</a></p> -->

	<% if TagsCollection %>
		<p class="tags-summary">
			Tags:
			<% loop TagsCollection %>
				<a href="$Link" title="View all posts tagged '$Tag'" rel="tag">$Tag</a><% if not Last %>,<% end_if %>
			<% end_loop %>
		</p>
	<% end_if %>
</div>
<hr>
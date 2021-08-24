
<ul class="feed-nav">

	<% if $BlogPosts %>
		<% loop $BlogPosts.Limit(3) %>
			<a href="$Link" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'"><li>$MenuTitle<br /><span class="posted-on">posted on $PublishDate.Format('F j')</span><!--<span class="read-more"> More</span><div class="clearfix"></div>--></li></a>
    	<% end_loop %>
	<% end_if %>

</ul>
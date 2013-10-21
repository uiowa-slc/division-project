
<ul class="feed-nav">
	<% with $BlogPage %>
		<% if $Entries %>
			<% loop $Entries('3',$Top.Tag) %>
				<a href="$Link" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'"><li>$MenuTitle<br /><span class="posted-on">posted on $Date.Format('F j')</span><!--<span class="read-more"> More</span><div class="clearfix"></div>--></li></a>
	    	<% end_loop %>
		<% end_if %>
	<% end_with %>
</ul>
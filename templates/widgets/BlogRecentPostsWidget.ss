<% if $Posts %>
<ul class="feed-nav">


		<% loop $Posts %>
			<a href="$Link" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'"><li>$MenuTitle<br /><% if $PublishDate %><span class="posted-on">posted on $PublishDate.Format('F j')</span><% end_if %></li></a>
    	<% end_loop %>


</ul>
<% end_if %>

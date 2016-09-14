	<p class="authorDate">
	<% if $PublishDate %>
	<%t Blog.Posted "Posted" %>
	<a href="$MonthlyArchiveLink">$PublishDate.Format("F j, Y")</a>
	<% end_if %>
	
	<% if $Credits %>
		<%t Blog.By "by" %>
		<% loop $Credits %><% if not $First && not $Last %>, <% end_if %><% if not $First && $Last %> and <% end_if %><% if $URLSegment %><a href="$URL">$Name.XML</a><% else %>$Name.XML<% end_if %><% end_loop %>
	<% end_if %>
	</p>
	<p class="authorDate">
	<% if $PublishDate %>
	<%t Blog.Posted "Posted" %>
	<a href="$MonthlyArchiveLink">$PublishDate.Format("F j, Y")</a>
	<% end_if %>
	
               <% if $StoryBy %>
                	<p>
						<em>Posted by <% if $StoryByEmail %><a href="mailto:$StoryByEmail">$StoryBy</a><% else %>$StoryBy<% end_if %> <% if $StoryByTitle %> // $StoryByTitle <% end_if %> <% if $StoryByDept %> - $StoryByDept <% end_if %></em>
                	</p>
			    <% end_if %>
	</p>
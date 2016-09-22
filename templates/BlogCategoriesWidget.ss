<% if $Categories %>
	<nav class="sec-nav">
	    <ul class="tag-nav">
	    <% loop $Categories %>
	        <li><a href="$Link">$Title <span class="count">($BlogPosts.Count)</span></a></li>
	    <% end_loop %>
	</nav>
<% end_if %>
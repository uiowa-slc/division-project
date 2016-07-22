<% if $Tags %>
	<nav class="sec-nav">
	    <ul class="tag-nav">
	    <% loop $Tags %>
	        <li><a href="$Link">$Title <span class="count">($BlogPosts.Count)</span></a></li>
	    <% end_loop %>
	</nav>
<% end_if %>
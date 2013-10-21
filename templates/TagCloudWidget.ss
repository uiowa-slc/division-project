	<nav class="sec-nav">
	    <ul class="tag-nav">
	    <% loop TagsCollection %>
	        <li><a href="$Link">$Tag <span class="count">($Count)</span></a></li>
	    <% end_loop %>
	    </ul>
	</nav>
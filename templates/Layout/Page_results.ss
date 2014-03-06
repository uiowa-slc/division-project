<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
	    <section class="main-content">
	    	<h1>$Title</h1>
	    	<% if $Query %>
	    		<p class="searchQuery">You searched for &quot;{$Query}&quot;</p>
	    	<% end_if %>

		    <% if $Results %>
		    <ul id="SearchResults">
		        <% loop $Results %>
		        <li>
		            <h4>
		                <a href="$Link">
		                    <% if $MenuTitle %>
		                    $MenuTitle
		                    <% else %>
		                    $Title
		                    <% end_if %>
		                </a>
		            </h4>
		            <%-- can't show content previews because shortcodes can break results. Thanks SilverStripe --%>
		            <%--<% if $Content %>
		                <p>$Content.Summary(30)</p>
		            <% end_if %>--%>
		            <a class="readMoreLink" href="$Link" title="Read more about &quot;{$Title}&quot;">Continue Reading</a>
		        </li>
		        <hr />
		        <% end_loop %>
		    </ul>
		    <% else %>
		    	<p>Sorry, your search query did not return any results.</p>
		    <% end_if %>

		    <% if $Results.MoreThanOnePage %>
		    <div id="PageNumbers">
		        <div class="pagination">
		            <% if $Results.NotFirstPage %>
		            <a class="prev" href="$Results.PrevLink" title="View the previous page">&larr;</a>
		            <% end_if %>
		            <span>
		                <% loop $Results.Pages %>
		                    <% if $CurrentBool %>
		                    $PageNum
		                    <% else %>
		                    <a href="$Link" title="View page number $PageNum" class="go-to-page">$PageNum</a>
		                    <% end_if %>
		                <% end_loop %>
		            </span>
		            <% if $Results.NotLastPage %>
		            <a class="next" href="$Results.NextLink" title="View the next page">&rarr;</a>
		            <% end_if %>
		        </div>
		        <p>Page $Results.CurrentPage of $Results.TotalPages</p>
		    </div>
		    <% end_if %>
	            	
		</section>
	    <section class="sec-content">
	    	<% include SideNav %>
	    </section>
	</div>
</div>
<%-- <% include TopicsAndNews %> --%>

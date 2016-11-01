$Header
<div class="main-content__container" id="main-content__container">

	<div class="row">	
		<div role="main" id="sticky-nav-area" class="main-content main-content--with-padding main-content--full-width">
			<h1>$Title</h1>

			<% if $Query %>
			    <p>You searched for &quot;{$Query}&quot;</p>
			<% end_if %>

			<% if $Results %>
			<ul class="article-list">
			    <% loop $Results %>
			    <li class="article-list__item">
			    	<a href="$Link" class="article-list__link">
				    	<article class="article-list__body">
					        <h2 class="article-list__header">
				                <% if $MenuTitle %>
				                $MenuTitle
				                <% else %>
				                $Title
				                <% end_if %>
					        </h2>
				        </article>
			        <% if $Content %>
			            <p class="article-list__text">$Content.LimitWordCountXML</p>
			        <% end_if %>
			         </a>
			    </li>
			    <% end_loop %>
			</ul>

			<% else %>
			<p>Sorry, your search query did not return any results.</p>
			<% end_if %>

			<% if $Results.MoreThanOnePage %>
			<div>
			    <div>
			        <% if $Results.NotFirstPage %>
			        <a href="$Results.PrevLink" title="View the previous page">&larr;</a>
			        <% end_if %>
			        <span>
			            <% loop $Results.Pages %>
			                <% if $CurrentBool %>
			                $PageNum
			                <% else %>
			                <a href="$Link" title="View page number $PageNum">$PageNum</a>
			                <% end_if %>
			            <% end_loop %>
			        </span>
			        <% if $Results.NotLastPage %>
			        	<a href="$Results.NextLink" title="View the next page">&rarr;</a>
			        <% end_if %>
			    </div>
			    <p>Page $Results.CurrentPage of $Results.TotalPages</p>
			</div>
			<% end_if %>			

		</div>

	</div>
	
</div>


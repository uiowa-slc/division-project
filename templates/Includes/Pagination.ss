<% if $MoreThanOnePage %>
<ul class="pagination text-center" role="navigation" aria-label="Pagination">

	<% if $NotFirstPage %>
		<li class="pagination-previous">
			<a href="{$PrevLink}" aria-label="Previous page">Previous</a>
		</li>
	<% else %>
		<li class="pagination-previous disabled">Previous</li>
	<% end_if %>

	<% loop $PaginationSummary(4) %>
		<% if $CurrentBool %>
			<li class="current"><span class="show-for-sr">You're on page</span>$PageNum</li>
		<% else %>
			<% if $Link %>
				<li><a href="$Link" aria-label="Page $PageNum">$PageNum</a></li>
			<% else %>
				<li class="ellipsis"></li>
			<% end_if %>
		<% end_if %>
	<% end_loop %>

	<% if $NotLastPage %>
		<li class="pagination-next"><a href="{$NextLink}" aria-label="Next page">Next</a></li>
	<% else %>
		<li class="pagination-next disabled">Next</li>
	<% end_if %>
</ul>
<% end_if %>
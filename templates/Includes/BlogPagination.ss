<% with $PaginatedList %>

<% if $MoreThanOnePage %>
<div class="pagination">
	<ul class="PageNumbers">
		<% if $NotFirstPage %>
			<li class="prev">
				<a class="paginate-left" href="$PrevLink" title="View the previous page">&lt;</a>
			</li>
		<% else %>	
			<li class="prev disabled">
				<a class="paginate-left disabled">&lt;</a>
			</li>
		<% end_if %>
	
    	<% loop $PaginationSummary(4) %>
			<% if $CurrentBool %>
				<li class="active"><a class="disabled">$PageNum</a></li>
			<% else %>
				<% if $Link %>
					<li>
						<a class="<% if BeforeCurrent %>paginate-left<% else %>paginate-right<% end_if %>" href="$Link">
						$PageNum
						</a>
					</li>
				<% else %>
					<li class="disabled"><a class="disabled">&hellip;</a></li>						
				<% end_if %>
			<% end_if %>
		<% end_loop %>
	
		<% if $NotLastPage %>
			<li class="next">
				<a class="next paginate-right" href="$NextLink" title="View the next page">&gt;</a>
			</li>
		<% else %>
			<li class="next disabled">
				<a class="next paginate-right disabled">&gt;</a>
			</li>
		<% end_if %>
	</ul>
</div>
<% end_if %>
<% end_with %>
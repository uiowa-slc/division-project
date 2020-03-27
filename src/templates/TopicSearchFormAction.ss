<!-- htmlmin:ignore -->
<% if $UseButtonTag %>
	<button $AttributesHTML>
		<i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i>
		<span>Search</span>
		
	</button>
<% else %>
	<input $AttributesHTML />

<% end_if %>
<!-- htmlmin:ignore -->


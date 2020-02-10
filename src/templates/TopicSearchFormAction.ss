<!-- htmlmin:ignore -->
<% if $UseButtonTag %>
	<button $AttributesHTML>
		<i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i>
		<% if $ButtonContent %>$ButtonContent<% else %><span class="show-for-sr">$Title.XML</span><% end_if %>
		
	</button>
<% else %>
	<input $AttributesHTML />

<% end_if %>
<!-- htmlmin:ignore -->


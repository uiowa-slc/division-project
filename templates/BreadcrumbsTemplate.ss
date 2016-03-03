<% if Pages.Count > 1 && not $BackgroundImage %>
	<ul class="breadcrumbs">
		<li><a href="$Baseref">Home</a></li>
		<% loop Pages %>
			<% if Last %>
				<li class="active">$Title.LimitCharacters(30).XML</li>
			<% else %>
				<li><a href="$Link">$MenuTitle.LimitCharacters(30).XML</a></li>
			<% end_if %>
		<% end_loop %>
	</ul>
<% end_if %>

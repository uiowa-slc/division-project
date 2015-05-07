<% if $BackgroundImage %>
	<% with $BackgroundImage %>
	<div class="img-container lazy" data-src="$URL" style="background-position: $PercentageX% $PercentageY%; ">
		<div class="img-fifty-top"></div>
	</div>
	<% end_with %>
<% end_if %>
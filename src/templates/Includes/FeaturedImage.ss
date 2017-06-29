<% with $BackgroundImage %>
<div class="background-image" data-interchange="[$CroppedFocusedImage(600,400).URL, small], [$CroppedFocusedImage(1600,500).URL, medium]" style="background-position: {$PercentageX}% {$PercentageY}%">
<% end_with %>
	<%-- <% if $LayoutType == "MainImage" %> --%>
		<div class="column row">
			<div class="background-image__header">
				<h1 class="background-image__title">$Title</h1>
			</div>
		</div>
	<%-- <% end_if %> --%>
</div>
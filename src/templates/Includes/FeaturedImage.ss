<% with $BackgroundImage %>
<div class="background-image" data-interchange="[$FocusFill(600,400).URL, small], [$FocusFill(1600,500).URL, medium]" style="background-position: {$PercentageX}% {$PercentageY}%">
<% end_with %>
	<%-- <% if $LayoutType == "MainImage" %> --%>
	<div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell">
    			<div class="background-image__header">
    				<h1 class="background-image__title">$Title</h1>
    			</div>
            </div>
		</div>
    </div>
	<%-- <% end_if %> --%>
</div>

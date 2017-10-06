<% if $BackgroundFeature.Tagline || $SiteConfig.Tagline || $BackgroundFeature.Buttons %>
<div class="legacy-hp__hero-text">
	<% if $BackgroundFeature.Tagline %>
		<h2 class="legacy-hp__blocktext">$BackgroundFeature.Tagline</h2>
	<% else_if $SiteConfig.Tagline %>
    	<h2 class="legacy-hp__blocktext">$SiteConfig.Tagline</h2>
    <% end_if %>
    <% if $BackgroundFeature.Buttons %>
    	$BackgroundFeature.Buttons
		<% end_if %>
</div>
<% end_if %>
<div class="orbit homepage-slider" role="region" aria-label="Featured News Items" data-orbit>
	<ul class="orbit-container">
		<div class="header--container">
		<% include Header %>
		</div>

		<% if $BackgroundFeatures.Count > 1 %>
		<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button>
		<button class="orbit-next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>
		<% end_if %>

		<% loop $BackgroundFeatures %>
			<% include HomePageSlide %>
		<% end_loop %>
	</ul>

</div>
<div class="row large-6 large-centered columns">
	<hr />
	<p class="text-center">$SiteConfig.Tagline</p>
	<article role="main">
		<h1>$Title</h1>
		$Content
		$Form
	</article>
</div>
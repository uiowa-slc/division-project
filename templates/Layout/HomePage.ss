<div class="slider slider--homepage" role="region" aria-label="Featured News Items" data-orbit>
	<ul class="slider__slides">
		<div class="header__container--in-slider">
		<% include HeaderDark %>
		</div>

		<% if $BackgroundFeatures.Count > 1 %>

			<button class="slider__navigation slider__navigation--previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button>
			<button class="slider__navigation slider__navigation--next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>

		<% end_if %>

		<% loop $BackgroundFeatures %>
			<% include HomePageSlide %>
		<% end_loop %>
	</ul>
</div>
<div class="row large-6 large-centered columns">
	<hr />
	<p class="text-center">$SiteConfig.Tagline</p>
	<article role="main" class="content">
		<h1>$Title</h1>
		$Content
		$Form
	</article>
</div>
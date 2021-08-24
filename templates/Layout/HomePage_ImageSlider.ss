<div class="slider slider--homepage" role="region" aria-label="Featured News Items" data-orbit data-auto-play="false">
	<ul class="slider__slides">
		
		$Header(auto,in-slider)

		<% if $BackgroundFeatures.Count > 1 %>

			<button class="slider__navigation slider__navigation--previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button>
			<button class="slider__navigation slider__navigation--next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>

		<% end_if %>

		<% loop $BackgroundFeatures %>
			<% include HomePageSlide %>
		<% end_loop %>
	</ul>
</div>
<% include HomePageContent %>
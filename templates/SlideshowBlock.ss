
<section class="content-block__container content-block__container--padding">
	<div class="content-block">
		<div class="slideshowblock">
			<% if $SlideshowBlockImages %>
				<div class="slideshow gallery" data-flickity='{ "lazyLoad": 2, "wrapAround": true }'>
					<% loop SlideshowBlockImages %>
						<figure class="slideshow__slide gallery-cell">
                            <img class="slideshow__img" data-flickity-lazyload="$Image.Pad(930, 616, f8f6f3).URL" alt="<% if $Caption %>$Caption.ATT<% end_if %>" />
							<% if $Caption %>
                                <figcaption class="slideshow__caption">
                                    $Caption
                                </figcaption>
                            <% end_if %>
						</figure>
					<% end_loop %>
				</div>
			<% end_if %>
		</div>
	</div>
</section>


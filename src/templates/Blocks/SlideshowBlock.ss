<section class="content-block__container content-block__container--padding">
	<div class="content-block">
		<div class="$CSSClasses">
			<% if $SlideshowBlockImages %>
				<% if $Title %><h3 class="slideshow__title">$Title</h3><% end_if %>
				<div class="slideshow" role="region" <% if $Title %>aria-label="$Title"<% end_if %>>
					<% loop SlideshowBlockImages %>
						<div class="slideshow__slide">
							
						<img class="slideshow__img" data-flickity-lazyload="$Image.CroppedFocusedImage(840, 525).URL" width="840" height="525" alt="<% if $Caption %>$Caption.ATT<% end_if %>" />
<%-- 							<% if $Up.UseExif %>
								<figcaption class="slideshow__caption"><span>$Image.Exif.Title</span></figcaption>
							<% else %> --%>
								<% if $Caption %><figcaption class="slideshow__caption"><span>$Caption</span></figcaption><% end_if %>
							<%-- <% end_if %> --%>
							
						</div>
					<% end_loop %>
				
				</div>
			<% end_if %>
		</div>
	</div>
</section>
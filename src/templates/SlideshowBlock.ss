
<% if $AreaName == "AfterContent" %>
<section class="content-block__container content-block__container--padding">
	<div class="content-block">
		<div class="$CSSClasses">
			<% if $SlideshowBlockImages %>
				<% if $Title && $ShowTitle %><h3 class="slideshow__title">$Title</h3><% end_if %>
				<div class="slideshow" role="region" <% if $Title && $ShowTitle %>aria-label="$Title"<% end_if %> data-flickity='{ "lazyLoad": 2, "contain": true, "groupCells": true }'>
					<% loop SlideshowBlockImages %>
						<div class="slideshow__slide slideshow__slide--multiple-slides <% if not $Up.Title %>slideshow__slide--no-title<% end_if %>">
							
						<a href="$Image.URL"><img class="slideshow__img" data-flickity-lazyload="$Image.FocusFill(840, 525).URL" height="525" alt="<% if $Caption %>$Caption.ATT<% end_if %>" /></a>
							<% if $Caption %><figcaption class="slideshow__caption"><span>$Caption</span></figcaption><% end_if %>
						</div>
					<% end_loop %>
				</div>
			<% end_if %>
		</div>
	</div>
</section>
<% if $AreaName == "BeforeContent" %>
<section class="content-block__container content-block__container--padding">
	<div class="content-block">
		<div class="$CSSClasses">
			<% if $SlideshowBlockImages %>
				<% if $Title && $ShowTitle %><h3 class="slideshow__title">$Title</h3><% end_if %>
				<div class="slideshow" role="region" <% if $Title && $ShowTitle %>aria-label="$Title"<% end_if %> data-flickity='{ "lazyLoad": 2, "contain": true, "groupCells": true }'>
					<% loop SlideshowBlockImages %>
						<div class="slideshow__slide slideshow__slide--multiple-slides <% if not $Up.Title %>slideshow__slide--no-title<% end_if %>">
							
						<a href="$Image.URL"><img class="slideshow__img" data-flickity-lazyload="$Image.FocusFill(840, 525).URL" height="525" alt="<% if $Caption %>$Caption.ATT<% end_if %>" /></a>
							<% if $Caption %><figcaption class="slideshow__caption"><span>$Caption</span></figcaption><% end_if %>
						</div>
					<% end_loop %>
				</div>
			<% end_if %>
		</div>
	</div>
</section>
<% else %>


<section class="content-block__container content-block__container--padding">
	<div class="content-block">
		<div class="$CSSClasses">
			<% if $SlideshowBlockImages %>
				<% if $Title && $ShowTitle %><h3 class="slideshow__title">$Title</h3><% end_if %>
				<div class="slideshow" role="region" <% if $Title && $ShowTitle %>aria-label="$Title"<% end_if %>>
					<% loop SlideshowBlockImages %>
						<div class="slideshow__slide">
							
						<img class="slideshow__img" data-flickity-lazyload="$Image.FocusFill(840, 525).URL" width="840" height="525" alt="<% if $Caption %>$Caption.ATT<% end_if %>" />
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
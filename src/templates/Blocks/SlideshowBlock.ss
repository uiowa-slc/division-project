<section class="content-block__container content-block__container--padding">
	<div class="content-block">
		<div class="$CSSClasses">
			<% if $SlideshowBlockImages %>
				<% if $Title %><h3>$Title</h3><% end_if %>
				<div class="orbit" role="region" <% if $Title %>aria-label="$Title"<% end_if %> data-orbit data-auto-play="false">
					<ul class="orbit-container">
						<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
						<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
						<% loop SlideshowBlockImages %>
							<li class="is-active orbit-slide">
								<img class="orbit-image" src="$Image.CroppedFocusedImage(840, 600).URL" alt="<% if $Caption %>$Caption<% end_if %>">
								<% if $Caption %><figcaption class="orbit-caption">$Caption</figcaption><% end_if %>
							</li>
						<% end_loop %>
					</ul>
				</div>
			<% end_if %>
		</div>
	</div>
</section>
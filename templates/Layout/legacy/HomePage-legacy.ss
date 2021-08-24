<div class="homepage__header">

	$Header("dark-header","overlay")

	<% if $NewHomePageHeroFeatures %>
		<div class="carousel" id="main-content__container">
			<% loop NewHomePageHeroFeatures %>
				<div class="carousel-cell">
					<% if $Image %>
						<% with $Image %>
						<div class="cell-bg" data-flickity-bg-lazyload="$FocusFill(1500,900).URL" <% if $FocusPointX || $FocusPointY %>style="background-position: $PercentageX% $PercentageY%;"<% end_if %>>
						<% end_with %>
							<div class="inner">
								<div class="cell-text">
									<span>Featured Page</span>
									<h2>$Title</h2>
									<% if $ExternalLink %>
										<a href="$ExternalLink" target="_blank" class="cell-btn">$ButtonText</a>
									<% else %>
										<a href="$AssociatedPage.Link" class="cell-btn">$ButtonText</a>
									<% end_if %>
								</div>
							</div>
						</div>
					<% else_if $Video %>
						<div class="cell-bg">
							<div class="fullwidth-video">
								<video playsinline autoplay muted loop autoplay src="$Video.URL" id="vid-bg" class="ani-vid-fadein" style="opacity: 1;" <% if $VideoPoster %>poster="$VideoPoster.FocusFill(1500,900).URL"<% end_if %>></video>
							</div>
							<div class="inner">
								<div class="cell-text">
									<span>Featured Page</span>
									<h2>$Title</h2>
									<% if $ExternalLink %>
										<a href="$ExternalLink" target="_blank" class="cell-btn">$ButtonText</a>
									<% else %>
										<a href="$AssociatedPage.Link" class="cell-btn">$ButtonText</a>
									<% end_if %>
								</div>
							</div>
						</div>
					<% else %>
						<%-- if no image or video, fallback to a default image --%>
						<% with $Image %>
						<div class="cell-bg" data-flickity-bg-lazyload="division-project/src/images/cell-bg.jpg">
						<% end_with %>
							<div class="inner">
								<div class="cell-text">
									<span>Featured Page</span>
									<h2>$Title</h2>
									<% if $ExternalLink %>
										<a href="$ExternalLink" target="_blank" class="cell-btn">$ButtonText</a>
									<% else %>
										<a href="$AssociatedPage.Link" class="cell-btn">$ButtonText</a>
									<% end_if %>
								</div>
							</div>
						</div>

					<% end_if %>
				</div>
			<% end_loop %>
		</div>
	<% end_if %>

	<% if $NewHomePageHeroFeatures && $NewHomePageHeroFeatures.Count > 1 %>
		<div class="carousel-nav" data-flickity='{ "asNavFor": ".carousel", "contain": true, "pageDots": false, "prevNextButtons": false, "autoPlay": true }'>
			<% loop NewHomePageHeroFeatures %>
				<div class="carousel-nav-cell">
					$Title
				</div>
			<% end_loop %>
		</div>
	<% end_if %>
</div>

<% include HomePageContent %>
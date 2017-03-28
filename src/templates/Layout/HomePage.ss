
<div class="homepage__header">

	$Header(dark-header,overlay)

	<% if $NewHomePageHeroFeatures %>
		<div class="carousel">
			<% loop NewHomePageHeroFeatures %>
				<div class="carousel-cell">
					<% if $Image %>
						<div class="cell-bg" data-flickity-bg-lazyload="$Image.CroppedFocusedImage(1400,900).URL">
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
								<video muted="" loop="" autoplay src="$Video.URL" id="vid-bg" class="ani-vid-fadein" style="opacity: 1;"></video>
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
					<% end_if %>
				</div>
			<% end_loop %>
		</div>
	<% end_if %>

	<% if $NewHomePageHeroFeatures %>
		<div class="carousel-nav" data-flickity='{ "asNavFor": ".carousel", "contain": true, "pageDots": false, "prevNextButtons": false, "autoPlay": true }'>
			<% loop NewHomePageHeroFeatures %>
				<div class="carousel-nav-cell">
					$Title
				</div>
			<% end_loop %>
		</div>
	<% end_if %>

		<%-- <div class="hero hero--is-overlay">

			<div class="row">
				<article class="hero-article">
					<p class="subheader subheader--white hero__aligner">News</p>
					<h1 class="hero-article__header">Empowering Students</h1>
					<p><a href="#" class="button button--hollow hero__aligner">Read Full Story</a></p>
				</article>
			</div>

			<div class="row">
				<div class="hero-related">
					<p class="subheader subheader--white hero__aligner">Related Content</p>
					<div class="hero__aligner">
						<div class="hero-related__list">
							<article class="hero-related__article">
								<p><em>September 25, 2016</em></p>
								<p>Curabitur blandit tempus porttitor.</p>
							</article>
							<article class="hero-related__article">
								<p><em>September 25, 2016</em></p>
								<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
							</article>
						</div>
					</div>
				</div>
			</div>

		</div> --%>

</div>

<% include HomePageContent %>
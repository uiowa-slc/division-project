
<div class="header__container header__container--{$DarkLightHeader} header__container--{$HeaderType}">
	<% include DivisionBar %>
</div>



<% if $HeaderImage %>

	<% if $HeaderText %>
		<div class="lp-header <% if $HeaderLogo %>lp-header--is-overlay<% end_if %>" data-interchange="[$HeaderImage.FocusFill(600,400).URL, small], [$HeaderImage.FocusFill(1600,800).URL, medium]">
			<div class="lp-header__container">
				<% if $HeaderLogo %>
					<img src="$HeaderLogo.URL"  class="lp-header__img">
				<% end_if %>
				<% if $HeaderText %>
					<h2 class="lp-header__title">$HeaderText</h2>
				<% end_if %>
			</div>
		</div>
	<% else %>

		<div class="lp-hero">
			<img src="$HeaderImage.URL" alt="$HeaderImageAltText" class="lp-hero__img" />
		</div>



	<% end_if %>



<% end_if %>

<!-- Section Menu -->
<% if $Sections %>
<div class="lp-menu dp-sticky">
	<nav class="lp-menu__nav">
		<ul class="lp-menu__list" data-magellan>
			<li class="lp-menu__listitem">
				<a href="#top" class="lp-menu__item lp-menu__item--title">$Title</a>
			</li>
			<% loop $Sections %>
				<li class="lp-menu__listitem">
					<a href="#$NiceTitle" class="lp-menu__item">$Title</a>
				</li>
			<% end_loop %>
			<% if $FacebookLink %>
				<li class="lp-menu__listitem">
					<a href="$FacebookLink" class="lp-menu__item" target="_blank"><i class="fa fa-facebook"></i></a>
				</li>
			<% end_if %>
			<% if $TwitterLink %>
				<li class="lp-menu__listitem">
					<a href="$TwitterLink" class="lp-menu__item" target="_blank"><i class="fa fa-twitter"></i></a>
				</li>
			<% end_if %>
			<% if $InstagramLink %>
				<li class="lp-menu__listitem">
					<a href="$InstagramLink" class="lp-menu__item" target="_blank"><i class="fa fa-instagram"></i></a>
				</li>
			<% end_if %>
		</ul>
	</nav>
</div>
<% end_if %>



<div id="top" class="main-content__container">

	$BeforeContent

	<div class="row">
		<article id="page-content" class="main-content <% if $Children || $Menu(2) || $SidebarArea.Elements ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width main-content--with-padding<% end_if %>">
			<% if $ShowBreadcrumbs %>
				$Breadcrumbs
			<% end_if %>
			$BeforeContentConstrained
			<% if $SecondaryImage %>
				<img class="main-content__main-img" src="$SecondaryImage.FocusCropWidth(600).URL" alt="" role="presentation"/>
			<% end_if %>
			<div class="main-content__text">
				<h1>$Title</h1>
				$Content
			</div>
			<% if $Sections %>
				<% loop $Sections %>
					<div class="lp-section" id="$NiceTitle" data-magellan-target="$Title">
						<hr>
						<h2 >$Title</h2>
						$Content

						<% if $Images %>
							<% if $FullImagePopup %>
							<div class="slideshow" role="region" <% if $Title %>aria-label="$Title"<% end_if %>>
									<% loop Images %>
										<div class="slideshow__slide">

										<a href="$Link" class="popup-link"><img class="slideshow__img" data-flickity-lazyload="$FocusFill(840, 525).URL" width="840" height="525" alt="<% if $Caption %>$Caption.ATT<% end_if %>" /></a>
												<% if $Caption %><figcaption class="slideshow__caption"><span>$Caption</span></figcaption><% end_if %>
										</div>
									<% end_loop %>
								</div>
							<% else %>
								<div class="slideshow" role="region" <% if $Title %>aria-label="$Title"<% end_if %>>
									<% loop Images %>
										<div class="slideshow__slide">

										<img class="slideshow__img" data-flickity-lazyload="$FocusFill(840, 525).URL" width="840" height="525" alt="<% if $Caption %>$Caption.ATT<% end_if %>" />
												<% if $Caption %><figcaption class="slideshow__caption"><span>$Caption</span></figcaption><% end_if %>
										</div>
									<% end_loop %>
								</div>
							<% end_if %>
						<% end_if %>

						<% if $VideoID %>
							<div class="flex-video">
								<iframe id="player" type="text/html" width="640" height="390"
								  src="https://www.youtube.com/embed/{$VideoID}?enablejsapi=1"
								  frameborder="0"></iframe>
							</div>
						<% end_if %>
						<% if $CalendarID %>
							<% if $EventList %>
								<% loop $EventList %>
									<% include LandingPageEvent %>
								<% end_loop %>
							<% else %>
								<p>No events currently listed. Please check back soon for the full event list.</p>
							<% end_if %>
						<% end_if %>
					</div>
				<% end_loop %>
			<% end_if %>
			$AfterContentConstrained
			$Form
		</article>

		<% if $Children %>
		<aside class="sidebar dp-sticky">
			<% include SideNav %>
			<% if $SideBarView %>
				$SideBarView
			<% end_if %>
			$Sidebar
		</aside>
	<% end_if %>
	</div>
	<br>
	$AfterContent
</div>

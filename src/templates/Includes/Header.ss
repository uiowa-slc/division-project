<div class="header__container header__container--{$DarkLightHeader} header__container--{$HeaderType}">
    <a class="skip-link" href="#main-content__container">Skip to Main Content</a>
    <!-- Add your site or app content here -->
    <% if $SiteConfig.ShowExitButton %>
    <a class="exit-button" href="http://weather.com"><span class="show-for-sr">Exit this website now</span></a>
    <% end_if %>
      $Layout

	<% include DivisionBar %>
	<header id="header" class="header header--{$DarkLightHeader} header--{$HeaderType}" role="banner">

		<div itemscope="" itemtype="http://schema.org/Organization">
			<h1 class="header__site-title" itemprop="name"><a href="$AbsoluteBaseURL" class="header__link--{$DarkLightHeader}" itemprop="url">$SiteConfig.Title</a></h1>
		</div>

		<div class="nav__toggle nav__toggle--menu show-for-small hide-for-medium">
			<button class="nav__link nav__link--{$DarkLightHeader} nav__link--mobile-toggle" aria-controls="nav__wrapper"><span class="nav__menu-icon nav__menu-icon--{$DarkLightHeader}" id="nav__menu-icon"></span><span class="nav__menu-text nav__menu-text--{$DarkLightHeader}" id="nav__menu-text">Menu</span></button>
		</div>

		<div class="nav__toggle nav__toggle--search show-for-small hide-for-medium">
			<button class="nav__link nav__link--{$DarkLightHeader}">
				<span class="show-for-sr">search</span>
				<i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i>
			</button>
		</div>

	</header>
	<div class="nav-collapse">
		<% include Navigation %>
	</div>
</div>
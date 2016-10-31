<% include DivisionBar %>
<header class="header" role="banner">
	<h1><a href="$BaseUrl">$SiteConfig.Title</a></h1>
	<div class="navigation__wrapper">
	<%-- <nav role="navigation" class="large-12 columns row" aria-label="Main menu"> --%>
	<nav role="navigation" class="large-12 columns row" aria-label="Main menu">
		<ul class="navigation clearfix">
			<% loop $Menu(1) %>
			<li class="navigation__item <% if $FirstLast %>navigation__item--$FirstLast<% end_if %><% if $Children %> navigation__item--parent<% end_if %> navigation__item--{$LinkOrCurrent} navigation__item--{$LinkOrSection}">
				<a class="navigation__link<% if $Children %> navigation__link--parent<% end_if %>" href="$Link">$MenuTitle</a>
				<% if $Children %>
					<% if $Children.Count > 4 %>
						<ul class="subnav subnav--two-columns">
							<% loop $Children %>
								<li class="subnav__item subnav__item--column <% if $FirstLast %>subnav__item--$FirstLast<% end_if %>"><a class="subnav__link" href="$Link">$MenuTitle.LimitCharacters(30)</a></li>
							<% end_loop %>
						</ul>
					<% else %>
						<ul class="subnav">
							<% loop $Children %>
								<li class="subnav__item <% if $FirstLast %>subnav__item--$FirstLast<% end_if %>"><a class="subnav__link" href="$Link">$MenuTitle</a></li>
							<% end_loop %>
						</ul>
					<% end_if %>
				<% end_if %>
			</li>
			<% end_loop %>
			<li class="navigation__item navigation__search-item" >
				<div class="navigation__link navigation__link--search">
					<i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i>
				</div>
			</li>
				<div class="site-search site-search--is-inactive" id="site-search">
					<div class="navigation__link navigation__link--in-search site-search__icon">
						<i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i>
					</div>
					<form id="site-search__form" class="site-search__form site-search__form--is-inactive"action="home/SearchForm">
						<label for="site-search__input" class="show-for-sr">Search this site</label>
						<input class="site-search__input" type="search" id="site-search__input" placeholder="Please enter a search term.">
						<input type="submit" name="action_results" class="show-for-sr button button--shaded" value="Search">
					</form>
					<div class="navigation__link navigation__link--in-search navigation__link--search-cancel site-search__icon"><i class="fa fa-lg fa-close site-search__cancel-button" aria-hidden="true"></i></div>
				</div>
		</ul>
	</nav>
	</div>
</header>
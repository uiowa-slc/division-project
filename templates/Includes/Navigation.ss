
<div class="navigation__toggle navigation__toggle--menu show-for-small-only">
	<div class="navigation__link navigation__link--{$DarkLight}"><i class="fa fa-lg fa-bars" aria-hidden="true"></i><span class="navigation__menu-text">Menu</span></div>
</div>
<div class="navigation__wrapper navigation__wrapper--{$HeaderType} navigation__wrapper--{$DarkLight}" id="navigation__wrapper">
	<div class="navigation__mobile-close-button"><i class="fa fa-lg fa-close site-search__cancel-button" aria-hidden="true"></i></div>
	<nav role="navigation" class="" aria-label="Main menu">
		<ul class="navigation navigation--{$DarkLight} navigation--{$HeaderType} clearfix" id="navigation">
			<% loop $Menu(1) %>
			<li class="navigation__item navigation__item--{$Top.DarkLight} <% if $FirstLast %>navigation__item--$FirstLast<% end_if %><% if $Children %> navigation__item--parent<% end_if %> navigation__item--{$LinkOrCurrent} navigation__item--{$LinkOrSection}">
				<a class="navigation__link navigation__link--{$Top.DarkLight}<% if $Children %> navigation__link--parent<% end_if %>" href="$Link">$MenuTitle</a>
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
			<li class="navigation__item navigation__item--{$DarkLight} navigation__search-item" id="navigation__search-item" >
				<div class="navigation__link navigation__link--{$DarkLight} navigation__link--search">
					<i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i>
				</div>
			</li>
			<% include SiteSearch %>
		</ul>
	</nav>
</div>
<div class="navigation__toggle navigation__toggle--search show-for-small-only">
	<div class="navigation__link navigation__link--{$DarkLight}"><i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i></span>
</div>
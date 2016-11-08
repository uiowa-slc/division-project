
<div class="nav__toggle nav__toggle--menu show-for-small-only">
	<div class="nav__link nav__link--{$DarkLight}"><i class="fa fa-lg fa-bars" aria-hidden="true"></i><span class="nav__menu-text">Menu</span></div>
</div>
<div class="nav__wrapper nav__wrapper--{$HeaderType} nav__wrapper--{$DarkLight}" id="nav__wrapper">
	<div class="nav__mobile-close-button"><i class="fa fa-lg fa-close site-search__cancel-button" aria-hidden="true"></i></div>
	<nav role="nav" class="" aria-label="Main menu">
		<ul class="nav nav--{$DarkLight} nav--{$HeaderType} clearfix" id="nav">
			<% loop $Menu(1) %>
			<li class="nav__item nav__item--{$Top.DarkLight} <% if $FirstLast %>nav__item--$FirstLast<% end_if %><% if $Children %> nav__item--parent<% end_if %> nav__item--{$LinkOrCurrent} nav__item--{$LinkOrSection}">
				<a class="nav__link nav__link--{$Top.DarkLight}<% if $Children %> nav__link--parent<% end_if %>" href="$Link">$MenuTitle</a>
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
			<li class="nav__item nav__item--{$DarkLight} nav__search-item" id="nav__search-item" >
				<div class="nav__link nav__link--{$DarkLight} nav__link--search">
					<i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i>
				</div>
			</li>
			<% include SiteSearch %>
		</ul>
	</nav>
</div>
<div class="nav__toggle nav__toggle--search show-for-small-only">
	<div class="nav__link nav__link--{$DarkLight}"><i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i></span>
</div>
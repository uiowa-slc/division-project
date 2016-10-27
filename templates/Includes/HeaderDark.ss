<% include DivisionBarDark %>
<header class="header header--dark" role="banner">
	<h1><a href="$BaseUrl">$SiteConfig.Title</a></h1>
		
			<nav role="navigation" class="navigation__wrapper navigation__wrapper--dark" aria-label="Main menu">
				<ul class="navigation navigation--dark clearfix">
					<% loop $Menu(1) %>
						<li class="navigation__item <% if $FirstLast %>navigation__item--$FirstLast<% end_if %><% if $Children %> navigation__item--parent<% end_if %> navigation__item--{$LinkOrCurrent} navigation__item--{$LinkOrSection} navigation__item--dark">
										<a class="navigation__link<% if $Children %> navigation__link--parent<% end_if %> navigation__link--dark" href="$Link">$MenuTitle</a>
										<% if $Children %>
											<% if $Children.Count > 4 %>
												<ul class="subnav subnav--two-columns">
												<% loop $Children %>
													<li class="subnav__item subnav__item--column <% if $FirstLast %>subnav__item--$FirstLast<% end_if %>"><a class="subnav__link" href="$Link">$MenuTitle</a></li>
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
				</ul>
			</nav>

	</header>
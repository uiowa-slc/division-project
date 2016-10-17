<% include DivisionBarDark %>
<header class="header header--dark" role="banner">
	<h1><a href="$BaseUrl">$SiteConfig.Title</a></h1>
		
			<nav role="navigation" class="navigation__wrapper navigation__wrapper--dark large-12 columns row" aria-label="Main menu">
				<ul class="navigation navigation--dark clearfix">
					<% loop $Menu(1) %>
					<li class="$FirstLast navigation__item <% if $Children %>navigation__item--parent<% end_if %>"><a class="navigation__link navigation__link--dark" href="$Link">$MenuTitle</a>
						<% if $Children %>
						<ul class="navigation__subnav">
							<% loop $Children %>
								<li class="$FirstLast navigation__subnav-item "><a class="navigation__subnav-link" href="$Link">$MenuTitle</a></li>
							<% end_loop %>
						</ul>
						<% end_if %>
					</li>
					<% end_loop %>
				</ul>
			</nav>

	</header>
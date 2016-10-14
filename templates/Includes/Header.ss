<% include DivisionBar %>
<header class="header header_dark" role="banner">
	<h1><a href="$BaseUrl">$SiteConfig.Title</a></h1>
		<nav role="navigation" class="nav-wrapper" aria-label="Main menu">
			<ul class="main-nav main-nav_dark clearfix">
				<% loop $Menu(1) %>
				<li class="$FirstLast <% if $Children %>parent<% end_if %>"><a href="$Link">$MenuTitle</a>
					<% if $Children %>
					<ul class="sub-nav unstyled">
						<% loop $Children %>
							<li class="$FirstLast "><a href="$Link">$MenuTitle</a></li>
						<% end_loop %>
					</ul>
					<% end_if %>
				</li>
				<% end_loop %>
			</ul>
		</nav>
	</header>
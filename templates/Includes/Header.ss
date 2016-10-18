<% include DivisionBar %>
<header class="header" role="banner">
	<h1><a href="$BaseUrl">$SiteConfig.Title</a></h1>
	<div class="navigation__wrapper">
	<nav role="navigation" class="large-12 columns row" aria-label="Main menu">
		<ul class="navigation clearfix">
			<% loop $Menu(1) %>
			<li class="$FirstLast navigation__item<% if $Children %> navigation__item--parent<% end_if %> navigation__item--{$LinkOrCurrent} navigation__item--{$LinkOrSection}">
				<a class="navigation__link<% if $Children %> navigation__link--parent<% end_if %>" href="$Link">$MenuTitle</a>
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
	</div>
</header>
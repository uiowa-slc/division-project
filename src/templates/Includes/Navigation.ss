



<div class="nav__wrapper nav__wrapper--{$HeaderType} nav__wrapper--{$DarkLight}" id="nav__wrapper">

	<nav class="" aria-label="Main menu">

		<ul class="nav nav--{$DarkLight} nav--{$HeaderType} clearfix" id="nav">
			<% loop $Menu(1) %>
			<li class="nav__item nav__item--{$Top.DarkLight} <% if $FirstLast %>nav__item--$FirstLast<% end_if %><% if $Children %> nav__item--parent<% end_if %> nav__item--{$LinkOrCurrent} nav__item--{$LinkOrSection}">
				<a id="nav-$Pos" class="nav__link nav__link--{$Top.DarkLight}<% if $Children %> nav__link--parent<% end_if %>" href="$Link">$MenuTitle</a>
				<% if $Children %>
					<button aria-hidden="true" class="second-level--open" aria-controls="subnav-$Pos" aria-expanded="false"><span class="show-for-sr">expand</span><svg class="dropdownarrow" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.4 8.8"><path d="M12.8,0l1.6,1.6L7.2,8.8,0,1.6,1.7,0,7.3,5.6Z" transform="translate(0 0)"></path></svg></button>
					<% if $Children.Count > 4 %>
						<ul class="subnav subnav--{$Top.DarkLight} subnav--two-columns" aria-hidden="true" aria-labelledby="nav-$Pos" id="subnav-$Pos">
							<% loop $Children %>
								<li class="subnav__item subnav__item--column <% if $FirstLast %>subnav__item--$FirstLast<% end_if %>"><a class="subnav__link subnav__link--{$Top.DarkLight}" href="$Link">$MenuTitle.LimitCharacters(30)</a></li>
							<% end_loop %>
						</ul>
					<% else %>
						<ul class="subnav subnav--{$Top.DarkLight}" aria-labelledby="nav-$Pos" id="subnav-$Pos">
							<% loop $Children %>
								<li class="subnav__item <% if $FirstLast %>subnav__item--$FirstLast<% end_if %>"><a class="subnav__link subnav__link--{$Top.DarkLight}" href="$Link">$MenuTitle</a></li>
							<% end_loop %>
						</ul>
					<% end_if %>

				<% end_if %>
			</li>
			<% end_loop %>
			<li class="nav__item nav__item--{$DarkLight} nav__search-item" id="nav__search-item" >
				<button class="nav__link nav__link--{$DarkLight} nav__link--search">
					<span class="show-for-sr">search</span>
					<i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i>
				</button>
			</li>
			<% include SiteSearch %>
		</ul>
	</nav>
</div>






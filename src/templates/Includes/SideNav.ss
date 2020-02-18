<% if $Children || $Menu(2) %>
<nav class="sidenav" aria-labelledby="sidenav-title">
	 <% if $Menu(2) %>
		<% with Level(1) %>
			<h2 id="sidenav-title" class="sidebar-sect-title"><% if $LinkOrCurrent = "current" %>$MenuTitle<% else %><a href="$Link">$MenuTitle</a><% end_if %></h2>
		<% end_with %>
	<% end_if %><%-- end_if Menu(2) --%>
	<% if $Menu(2) %>
		<ul class="sidenav__menu">
			<% loop $Menu(2) %>
				<li class="sidenav__item sidenav__item--$LinkingMode">
					<a class="sidenav__link" href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a>
					<% if $LinkOrSection == "section" && $Children %>
						<ul class="sidenav__second-level">
							<% loop Children %>
								<li class="sidenav__item sidenav__item--second-level sidenav__item--$LinkingMode"><a class="sidenav__link" href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a>
									<% if $LinkOrSection = "section" && Children %>
										<ul class="sidenav__third-level">
											<% loop Children %>
												<li class="sidenav__item sidenav__item--third-level sidenav__item--$LinkingMode"><a class="sidenav__link" href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a>
											<% end_loop %><%-- end_loop Children --%>
										</ul>
									<% end_if %><%-- end_if $LinkOrSection = "section" && Children --%>
								</li>
							<% end_loop %><%-- end_loop Children --%>
						</ul>
					<% end_if %> <%-- end_if $LinkOrSection = "section" && Children --%>
				</li>
			<% end_loop %><%-- end_loop Menu(2) --%>
		</ul>
	<% end_if %><%-- end_if Menu(2) --%>
</nav>
<% end_if %>

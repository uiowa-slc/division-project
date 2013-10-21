<% if Menu(2) %>
	<% with Level(1) %>
		<h3 class="section-title"><% if $LinkOrCurrent = "current" %>$MenuTitle<% else %><a href="$Link">$MenuTitle</a><% end_if %></h3>
	<% end_with %>
<% end_if %>

<% if Menu(2) %>
<nav class="sec-nav">
	<ul class="first-level">
			<% with Level(1) %>
				<li <% if $LinkOrCurrent = "current" %>class="active"<% end_if %>><a href="$Link">$MenuTitle</a></li>
			<% end_with %>
			<% loop Menu(2) %>
				<li <% if $LinkOrCurrent = "current" %>class="active"<% end_if %>><a href="$Link">$MenuTitle</a>
				
				<%-- third level nav option 1 --%>
					<% if $LinkOrSection = "section" && Children %>
						<ul class="second-level">
							<% loop Children %>
								<li <% if $LinkOrCurrent = "current" %>class="active"<% end_if %>>
									<a href="$Link">$MenuTitle</a>
									<% if $LinkOrSection = "section" && Children %>
										<ul class="third-level">
											<% loop Children %>
												<li <% if $LinkOrCurrent = "current" %>class="active"<% end_if %>>
													<a href="$Link">$MenuTitle</a>
												</li>
											<% end_loop %>
										</ul>
									<% end_if %>

								</li>
							<% end_loop %>
						</ul>
					<% end_if %>
					
				<%-- end third level nav option 1 --%>
				
				</li>
			<% end_loop %>
		
	</ul>
</nav>
<% end_if %>

<aside>
	<% if SidebarItems %>
		<% loop SidebarItems %>
			<% include SidebarItem %>
		<% end_loop %>
	<% end_if %>
</aside>
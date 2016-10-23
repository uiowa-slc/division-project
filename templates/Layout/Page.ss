<% include Header %>
<% if $BackgroundImage %>
	<div class="row-fluid">
	
			<img src="$BackgroundImage.URL" alt="" role="presentation" class="large-12"/>
	
	</div>
<% end_if %>
<div class="main">	
	<%-- <div class="large-7 large-offset-2 columns"> --%>
		<article role="main" class="main__content">
			$Content
			$Form
		</article>
	<%-- </div> --%>
	<%-- <div class="large-2 large-offset-1 columns"> --%>
		<nav class="sidenav">
			 <% if $Menu(2) %>
				<% with Level(1) %>
					<h2 class="sidenav__section-title"><% if $LinkOrCurrent = "current" %>$MenuTitle<% else %><a href="$Link">$MenuTitle</a><% end_if %></h2>
				<% end_with %>
			<% end_if %><%-- end_if Menu(2) --%>
			<% if $Menu(2) %>
				<ul class="sidenav__menu">
					<% with $Level(1) %>
						<li class="sidenav__item--$LinkOrCurrent"><a href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a></li>
					<% end_with %><%-- end_with Level(1) --%>
					<% loop $Menu(2) %>
						<li class="sidenav__item--$LinkOrCurrent">
							<a href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a>
							<% if $LinkOrSection == "section" && $Children %>
								<ul class="sidenav__second-level">
									<% loop Children %>
										<li class="sidenav__second-level-item--$LinkOrCurrent"><a href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a>
											<% if $LinkOrSection = "section" && Children %>
												<ul class="sidenav__third-level-item">
													<% loop Children %>
														<li class="sidenav__third-level-item--$LinkOrCurrent"><a href="<% if $regularLink %>$regularLink<% else %>$Link<% end_if %>">$MenuTitle</a>
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
	<%-- </div> --%>
</div>




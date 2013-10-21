<header class="header clearfix" role="banner">
	<div class="container">
		
		<h1><a href="{$BaseHref}" class="logo">Vice President <br class="rwd-break">For Student Life</a></h1>
		
		<nav role="navigation" class="nav-main-wrapper clearfix hide-print">
			<h2 class="nav-title"><a href="#">Menu <span></span></a></h2>
			<ul class="nav-main clearfix">
				<% loop Menu(1) %>
					<li class="<% if $LinkOrSection = section %>active<% end_if %>"><a href="$Link">$MenuTitle</a></li>
				<% end_loop %>
			</ul>
		</nav>

	</div><!-- end .container -->
</header>
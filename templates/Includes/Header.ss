<div class="header__container header__container--{$DarkLight} header__container--{$HeaderType}">
<% include DivisionBar %>
<header class="header header--{$DarkLight} header--{$HeaderType}" role="banner">
	<h1><a href="$BaseUrl" class="header__link--{$DarkLight}">$SiteConfig.Title</a></h1>
	<% if $HeaderType == "overlay" %>
		<div class="row large-12 columns">
			<% include Navigation %>
		</div>
	<% else %>
		<% include Navigation %>
	<% end_if %>
</header>			
</div>
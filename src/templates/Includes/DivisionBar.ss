<div class="division-bar division-bar--{$DarkLight}">

	<div class="division-bar__uiowa">
		<a href="https://uiowa.edu/"><img src="{$ThemeDir}/dist/images/uiowa--{$DarkLight}.png" class="division-bar__uiowa-logo" alt="The University of Iowa" /></a>
	</div>

	<% if $SiteConfig.QuickLinkTitleOne %>
	<ul class="division-bar__menu">
		<% if $SiteConfig.QuickLinkTitleOne %>
			<li class="division-bar__menu-item"><a class="division-bar__link division-bar__link--{$DarkLight}" href="$SiteConfig.QuickLinkURLOne">$SiteConfig.QuickLinkTitleOne</a></li>
		<% end_if %>
		<% if $SiteConfig.QuickLinkTitleTwo %>
			<li class="division-bar__menu-item"><a class="division-bar__link division-bar__link--{$DarkLight}" href="$SiteConfig.QuickLinkURLTwo">$SiteConfig.QuickLinkTitleTwo</a></li>
		<% end_if %>
		<% if $SiteConfig.QuickLinkTitleThree %>
			<li class="division-bar__menu-item"><a class="division-bar__link division-bar__link--{$DarkLight}" href="$SiteConfig.QuickLinkURLThree">$SiteConfig.QuickLinkTitleThree</a></li>
		<% end_if %>
	</ul>
	<% end_if %>

</div>
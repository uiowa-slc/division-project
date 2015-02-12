<meta property="og:title" content="$Title" />
<meta property="og:type" content="article" />
<meta property="og:url" content="$AbsoluteLink" />
<% if $Image %>
	<meta property="og:image" content="$Image.SetWidth(600).AbsoluteURL" />
<% else_if $Photo %>
	<meta property="og:image" content="$Photo.SetWidth(600).AbsoluteURL" />
<% else %>
	<meta property="og:image" content="{$BaseHref}{$ThemeDir}/images/og-poster.jpg" />
<% end_if %>
<meta property="og:description" content="$Content.LimitCharacters(120).ATT" />
<meta property="og:site_name" content="$SiteConfig.Title.ATT" />
<meta property="fb:admins" content="64131067165" />
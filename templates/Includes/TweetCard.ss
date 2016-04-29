<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@nytimes">
<meta name="twitter:creator" content="@SarahMaslinNir">
<meta name="twitter:title" content="$Title">
<meta name="twitter:description" content="$Content">




	<% if $Image %>
	<meta name="twitter:image" content="$Image.AbsoluteURL">
	<% else_if $Photo %>
		<meta name="twitter:image" content="$Photo.AbsoluteURL">
	<% else_if $BackgroundImage %>
		<meta name="twitter:image" content="$BackgroundImage.AbsoluteURL">	
	<% else %>
		<meta property="og:image" content="{$BaseHref}division-project/images/og-dsl.png" />
		<meta property="og:image:width" content="1200" />
		<meta property="og:image:height" content="630" />
	<% end_if %>
	<meta property="og:description" content="$Content.LimitCharacters(120).ATT" />


<% end_if %>
	<meta property="og:type" content="article" />
	<meta property="og:url" content="$AbsoluteLink" />
	<meta property="og:site_name" content="$SiteConfig.Title.ATT" />
	<meta property="fb:admins" content="64131067165" />

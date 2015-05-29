<% if $URLSegment == "home" %>

	<meta property="og:title" content="$SiteConfig.Title" />
	<meta property="og:content" content="The Division of Student Life fosters student success by creating and promoting inclusive educationally purposeful services and activities within and beyond the classroom." />
  <% if $BackgroundFeature %>
  	<meta property="og:image" content="$BackgroundFeature.Image.AbsoluteURL" />
  <% else %>
 	 <meta property="og:image" content="{$BaseHref}division-project/images/hero-image.jpg" />
  <% end_if %>

<% else %>
	<meta property="og:title" content="$Title" />

	<% if $Image %>
		<meta property="og:image" content="$Image.SetWidth(600).AbsoluteURL" />
	<% else_if $Photo %>
		<meta property="og:image" content="$Photo.SetWidth(600).AbsoluteURL" />
	<% else_if $BackgroundImage %>
		<meta property="og:image" content="$BackgroundImage(600).AbsoluteURL" />
	<% else %>
		<meta property="og:image" content="{$BaseHref}division-project/images/og-dsl.png" />
	<% end_if %>
	<meta property="og:description" content="$Content.LimitCharacters(120).ATT" />


<% end_if %>
	<meta property="og:type" content="article" />
	<meta property="og:url" content="$AbsoluteLink" />
	<meta property="og:site_name" content="$SiteConfig.Title.ATT" />
	<meta property="fb:admins" content="64131067165" />

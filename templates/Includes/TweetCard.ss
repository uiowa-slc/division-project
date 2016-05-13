<meta name="twitter:card" content="summary_large_image">

<meta name="twitter:site" content="@$SiteConfig.TwitterHandle">
<meta name="twitter:creator" content="@$SiteConfig.TwitterHandle">


<% if $URLSegment == "home" %>
	
	<meta name="twitter:title" content="$SiteConfig.Title">

	<% if $SiteConfig.GroupSummary %>
		<meta name="twitter:description" content="$SiteConfig.GroupSummary.ATT">
	<% else %>
		<meta name="twitter:description" content="The Division of Student Life fosters student success by creating and promoting inclusive educationally purposeful services and activities within and beyond the classroom." />
	<% end_if %>

  <% if $SiteConfig.PosterImage %>
  		<meta name="twitter:image" content="$SiteConfig.PosterImage.AbsoluteURL"> 	
  <% else %>
		<meta name="twitter:image" content="{$BaseHref}division-project/images/og-dsl.png" />
  <% end_if %>

<% else %>
	<meta name="twitter:title" content="$Title" />

	<% if $Image %>
		<meta name="twitter:image" content="$Image.ScaleWidth(600).AbsoluteURL" />
	<% else_if $Photo %>
		<meta name="twitter:image" content="$Photo.ScaleWidth(600).AbsoluteURL" />

	<% else_if $BackgroundImage %>
		<meta name="twitter:image" content="$BackgroundImage(600).AbsoluteURL" />
		
	<% else %>
		<meta name="twitter:image" content="{$BaseHref}division-project/images/og-dsl.png" />

	<% end_if %>

	<meta name="twitter:description" content="$Content.LimitCharacters(120).ATT" />


<% end_if %>



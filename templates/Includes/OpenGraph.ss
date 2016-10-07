<% if $URLSegment == "home" %>

	<meta property="og:title" content="$SiteConfig.Title" />

	<% if $SiteConfig.GroupSummary %>
		<meta property="og:content" content="$SiteConfig.GroupSummary.ATT" />
	<% else %>
		<meta property="og:content" content="The Division of Student Life fosters student success by creating and promoting inclusive educationally purposeful services and activities within and beyond the classroom." />
	<% end_if %>

  <% if $SiteConfig.PosterImage %>
  	<meta property="og:image" content="$SiteConfig.PosterImage.AbsoluteURL" />
	<meta property="og:image:width" content="$SiteConfig.PosterImage.Width" />
	<meta property="og:image:height" content="$SiteConfig.PosterImage.Height" />  	
  <% else %>
		<meta property="og:image" content="{$BaseHref}division-project/images/og-dsl.png" />
		<meta property="og:image:width" content="1200" />
		<meta property="og:image:height" content="630" />
  <% end_if %>

<% else %>
	<meta property="og:title" content="$Title" />

	<% if $Image %>
		<meta property="og:image" content="$Image.ScaleWidth(600).AbsoluteURL" />
		<meta property="og:image:width" content="600" />
		<meta property="og:image:height" content="$Image.ScaleWidth(600).Height" />

	<% else_if $FeaturedImage %>
		<meta property="og:image" content="$FeaturedImage.ScaleWidth(600).AbsoluteURL" />
		<meta property="og:image:width" content="600" />
		<meta property="og:image:height" content="$FeaturedImage.ScaleWidth(600).Height" />
	<% else_if $Photo %>
		<meta property="og:image" content="$Photo.ScaleWidth(600).AbsoluteURL" />
		<meta property="og:image:width" content="600" />
		<meta property="og:image:height" content="$Photo.ScaleWidth(600).Height" />
	<% else_if $BackgroundImage %>
		<meta property="og:image" content="$BackgroundImage(600).AbsoluteURL" />
		<meta property="og:image:width" content="$BackgroundImage.Width" />
		<meta property="og:image:height" content="$BackgroundImage.Height" />		
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

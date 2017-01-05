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

	<% if $OgTitle %>
		<meta property="og:title" content="$OgTitle.ATT" />
	<% else %>
		<meta property="og:title" content="$Title.ATT" />
	<% end_if %>

	<% if $OgImage %>
		<meta property="og:image" content="$OgImage.FocusFillMax(1200,630).AbsoluteURL" />
		<meta property="og:image:width" content="$OgImage.FocusFillMax(1200,630).Width" />
		<meta property="og:image:height" content="$OgImage.FocusFillMax(1200,630).Height" />
	<% else_if $Image %>
		<meta property="og:image" content="$Image.FocusFillMax(1200,630).AbsoluteURL" />
		<meta property="og:image:width" content="$Image.FocusFillMax(1200,630).Width" />
		<meta property="og:image:height" content="$Image.FocusFillMax(1200,630).Height" />
	<% else_if $FeaturedImage %>
		<meta property="og:image" content="$FeaturedImage.FocusFillMax(1200,630).AbsoluteURL" />
		<meta property="og:image:width" content="$FeaturedImage.FocusFillMax(1200,630).Width" />
		<meta property="og:image:height" content="$FeaturedImage.FocusFillMax(1200,630).Height" />	
	<% else_if $Photo %>
		<meta property="og:image" content="$Photo.FocusFillMax(1200,630).AbsoluteURL" />
		<meta property="og:image:width" content="$Photo.FocusFillMax(1200,630).Width" />
		<meta property="og:image:height" content="$Photo.FocusFillMax(1200,630).Height" />	
	<% else_if $BackgroundImage %>
		<meta property="og:image" content="$BackgroundImage.FocusFillMax(1200,630).AbsoluteURL" />
		<meta property="og:image:width" content="$BackgroundImage.FocusFillMax(1200,630).Width" />
		<meta property="og:image:height" content="$BackgroundImage.FocusFillMax(1200,630).Height" />		
	<% else %>
		<meta property="og:image" content="{$BaseHref}division-project/images/og-dsl.png" />
		<meta property="og:image:width" content="1200" />
		<meta property="og:image:height" content="630" />
	<% end_if %>

	<% if $OgDescription %>
		<meta property="og:description" content="$OgDescription.LimitCharacters(120).ATT" />
	<% else %>
		<meta property="og:description" content="$Content.LimitCharacters(120).ATT" />
	<% end_if %>


<% end_if %>
	<meta property="og:type" content="article" />
	<meta property="og:url" content="$AbsoluteLink" />
	<meta property="og:site_name" content="$SiteConfig.Title.ATT" />
	<meta property="fb:admins" content="64131067165" />

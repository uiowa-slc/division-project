<meta name="twitter:card" content="summary_large_image">

<% if $SiteConfig.TwitterHandle %>
	<meta name="twitter:site" content="@$SiteConfig.TwitterHandle">
	<meta name="twitter:creator" content="@$SiteConfig.TwitterHandle">
<% else %>
	<meta name="twitter:site" content="@UIStudentLife">
	<meta name="twitter:creator" content="@UIStudentLife">
<% end_if %>


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
  		<meta name="twitter:image" content="{$BaseURL}division-project/images/og-dsl.png"> 	
  <% end_if %>

<% else %>

	<% if $OgTitle %>
		<meta name="twitter:title" content="$OgTitle" />
	<% else %>
		<meta name="twitter:title" content="$Title" />
	<% end_if %>

	<% if $OgImage %>
		<meta name="twitter:image" content="$OgImage.FocusFillMax(1200,630).AbsoluteURL" />
	<% else_if $Image %>
		<meta name="twitter:image" content="$Image.FocusFillMax(1200,630).AbsoluteURL" />
	<% else_if $FeaturedImage %>
		<meta name="twitter:image" content="$FeaturedImage.FocusFillMax(1200,630).AbsoluteURL" />
	<% else_if $Photo %>
		<meta name="twitter:image" content="$Photo.FocusFillMax(1200,630).AbsoluteURL" />
	<% else_if $BackgroundImage %>
		<meta name="twitter:image" content="$BackgroundImage.FocusFillMax(1200,630).AbsoluteURL" />		
	<% else %>
		<meta name="twitter:image" content="{$BaseHref}division-project/images/og-dsl.png" />
	<% end_if %>

	<% if $OgDescription %>
		<meta name="twitter:description" content="$OgDescription.LimitCharacters(120).ATT" />
	<% else %>
		<meta name="twitter:description" content="$Content.LimitCharacters(120).ATT" />
	<% end_if %>


<% end_if %>
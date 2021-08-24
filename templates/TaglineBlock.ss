<section class="content-block__container tagline__container" <% if $Heading %>aria-labelledby="Block$ID"<% end_if %>>
	<div class="content-block row">
		<article class="tagline" role="main">
			<% if $Heading %>
				<h3 id="Block$ID" class="content-block-header header--centered header--small tagline__heading">$Heading</h3>
			<% end_if %>
			<% if $TaglineAlt %>
				<p class="tagline__text">$TaglineAlt</p>
			<% else %>
				<p class="tagline__text">$SiteConfig.Tagline</p>
			<% end_if %>
			<div class="tagline__separator"></div>
		</article>
	</div>
</section>
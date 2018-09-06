<div class="row">
	<div class="large-12 columns">
		<section class="content-block__container content-block__container--padding">
			<div class="content-block">
				<% if $ShowTitle %><h2 class="header">$Title</h2><% end_if %>
				<div class="embed-block__embed-container <% if $EmbedMethod == "automatic" %>responsive-embed {$Shape} <% else %>embed-block__embed-container--manual unresponsive-embed<% end_if %>">
					<iframe class="embed-block__iframe dp-lazy" width="$Width" height="$Height"data-original="$EmbeddedURL" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</section>
	</div>
</div>


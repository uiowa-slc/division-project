<!-- Loop Children -->
<% if $Children %>
	<section class="childpages" aria-labelledby="ChildPages">
	<h2 class="show-for-sr" id="ChildPages">Related Navigation</h2>
	<% loop $Children %>
		<div class="childpages__page <% if $BackgroundImage || $MainImage || $YoutubeBackgroundEmbed || $HeaderImage%>childpages--withphoto<% end_if %>">
			<a href="$Link" class="childpages__blocklink">
				<% if $BackgroundImage %>
					<img data-original="$BackgroundImage.FocusFill(180,150).URL" width="180" height="150" class="childpages__img dp-lazy" alt="" role="presentation">
				<% else_if $YoutubeBackgroundEmbed %>
					<img src="http://img.youtube.com/vi/$YoutubeBackgroundEmbed/sddefault.jpg" class="childpages__img" alt="$Title" alt="" role="presentation">
				<% else_if $MainImage %>
					<img data-original="$MainImage.Pad(180,150).URL" width="180" height="150" class="childpages__img dp-lazy" alt="" role="presentation">
				<% else_if $HeaderImage %>
					<img data-original="$HeaderImage.Pad(180,150).URL" width="180" height="150" class="childpages__img dp-lazy" alt="" role="presentation">
				<% end_if %>
				<div class="clearfix childpages__content">
					<h3 class="childpages__title">$Title</h3>
					<% if $MetaDescription %>
						<p class="childpages__summary">$MetaDescription.LimitCharacters(200)</p>
					<% else %>
						<p class="childpages__summary">$Content.Summary(100)</p>
					<% end_if %>
					<span class="button small black hollow">Learn More</span>
				</div>
			</a>
		</div>
	<% end_loop %>
	</section>
<% end_if %>
<!-- end Loop Children -->

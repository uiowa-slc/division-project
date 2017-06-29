<!-- Loop Children -->
<% if $Children %>
	<section class="childpages" aria-labelledby="ChildPages">
	<h2 class="show-for-sr" id="ChildPages">Related Navigation</h2>
	<% loop $Children %>
		<div class="childpages__page <% if $BackgroundImage || $YoutubeBackgroundEmbed %>childpages--withphoto<% end_if %>">
			<a href="$Link" class="childpages__blocklink">
				<% if $BackgroundImage %>
					<img data-original="$BackgroundImage.CroppedFocusedImage(180,150).URL" width="180" height="150" class="childpages__img dp-lazy" alt="$Title">
				<% else_if $YoutubeBackgroundEmbed %>
					<img src="http://img.youtube.com/vi/$YoutubeBackgroundEmbed/sddefault.jpg" class="childpages__img" alt="$Title">
				<% end_if %>
				<div class="clearfix childpages__content">
					<h3 class="childpages__title">$Title</h3>
					<% if $MetaDescription %>
						<p class="childpages__summary">$MetaDescription.LimitCharacters(200)</p>
					<% else %>
						<p class="childpages__summary">$Content.FirstSentence.LimitCharacters(200)</p>
					<% end_if %>
					<span class="childpages__link">Learn More</span>
				</div>
			</a>
		</div>
	<% end_loop %>
	</section>
<% end_if %>
<!-- end Loop Children -->
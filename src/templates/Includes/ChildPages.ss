<!-- Loop Children -->
<% if $Children %>
	<section class="childpages">
	<% loop $Children %>
		<div class="childpages__page <% if $BackgroundImage %>childpages--withphoto<% end_if %>">
			<a href="$Link" class="childpages__blocklink">
				<% if $BackgroundImage %>
					<img src="$BackgroundImage.CroppedImage(180,150).URL" alt="$Title" class="childpages__img">
				<% end_if %>
				<div class="childpages__content">
					<h3 class="childpages__title">$Title</h3>
					<p class="childpages__summary">$Content.LimitCharacters(120)</p>
					<span class="childpages__link">Learn More</span>
				</div>
			</a>
		</div>
	<% end_loop %>
	</section>
<% end_if %>
<!-- end Loop Children -->
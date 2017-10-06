<section class="content-block__container content-block__container--padding">
	<div class="content-block">
		<div class="backgroundvideo">
			<% if $YoutubeEmbed %>
				<div id="ESEE" class="backgroundvideo__container" data-interchange="[https://img.youtube.com/vi/$YoutubeEmbed/sddefault.jpg, small], [https://img.youtube.com/vi/$YoutubeEmbed/maxresdefault.jpg, large]">
					<a href="https://www.youtube.com/embed/$YoutubeEmbed" data-video="$YoutubeEmbed" class="backgroundvideo__link">
					</a>
				</div>
			<% else_if $VimeoEmbed %>
				<iframe class="dp-lazy" data-original="https://player.vimeo.com/video/$VimeoEmbed" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			<% end_if %>
		</div>
	</div>
</section>
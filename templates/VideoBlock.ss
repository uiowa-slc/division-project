<% if $AreaName == "Sidebar" %>

<section class="content-block__container content-block__container--padding">
	<div class="content-block">
		<div class="backgroundvideo">
			<div id="ESEE" class="backgroundvideo__container" data-interchange="[https://img.youtube.com/vi/$YoutubeEmbed/hqdefault.jpg, small]">
				<a href="https://www.youtube.com/embed/$YoutubeEmbed" data-video="$YoutubeEmbed" class="backgroundvideo__link">
				</a>
			</div>
		</div>
	</div>
</section>

<% else %>
<section class="content-block__container content-block__container--padding">

	<div class="content-block">
			<% if $ShowTitle %>
			<h3 id="Block$ID" class="content-block-header header--centered header--small tagline__heading" style="padding-top: 30px;">$Title</h3>
		<% end_if %>
		<div class="backgroundvideo">
			<% if $YoutubeEmbed %>
				<div id="ESEE" class="backgroundvideo__container" data-interchange="[https://img.youtube.com/vi/$YoutubeEmbed/hqdefault.jpg, small]">
					<a href="https://www.youtube.com/embed/$YoutubeEmbed" data-video="$YoutubeEmbed" class="backgroundvideo__link">
					</a>
				</div>
			<% else_if $VimeoEmbed %>
				<iframe class="dp-lazy" data-original="https://player.vimeo.com/video/$VimeoEmbed" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			<% end_if %>
		</div>
	</div>
</section>
<% end_if %>
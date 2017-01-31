<section class="content-block__container content-block__container--padding">
	<div class="content-block">
		<div class="$CSSClasses">
				<div class="videoblock__media">
					<% if $YoutubeEmbed %>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/$YoutubeEmbed" frameborder="0" allowfullscreen></iframe>
					<% else_if $VimeoEmbed %>
						<iframe src="https://player.vimeo.com/video/$VimeoEmbed" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<% end_if %>
				</div>
			<%-- <div class="videoblock__body">
				<h3 class="videoblock__body__title">$Title</h3>
				<% if $VideoSummary %>
				<div class="videoblock__body__desc">
					$VideoSummary
				</div>
				<% end_if %>
			</div> --%>
		</div>
	</div>
</section>
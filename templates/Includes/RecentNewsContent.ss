<li>
	<a href="$Link" class="clearfix">
		<% if $FeaturedImage %>
			<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="$FeaturedImage.FocusFill(400,300).URL" width="400" height="300" alt="$Title">
		<% else_if $BackgroundImage %>
			<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="$BackgroundImage.FocusFill(400,300).URL" width="400" height="300" alt="$Title">
		<% else_if $YoutubeBackgroundEmbed %>
			<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="http://img.youtube.com/vi/$YoutubeBackgroundEmbed/mqdefault.jpg" width="400" height="300" alt="$Title">
		<% end_if %>
		$Title<br>
		<span class="blogcard__date">$PublishDate.format("MMMM d, y")</span>
	</a>
</li>

<li>
	<a href="$Link" class="clearfix">
		<% if $FeaturedImage %>
			<img src="$FeaturedImage.CroppedImage(400,300).URL" alt="$Title">
		<% else_if $BackgroundImage %>
			<img src="$BackgroundImage.CroppedImage(400,300).URL" alt="$Title">
		<% else_if $YoutubeBackgroundEmbed %>
			<img src="http://img.youtube.com/vi/$YoutubeBackgroundEmbed/mqdefault.jpg" alt="$Title">
		<% end_if %>
		$Title<br>
		<em class="bloglistitem__date">$PublishDate.format("F d, Y")</em>
	</a>
</li>
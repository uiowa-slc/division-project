<li>
	<a href="$Link" class="clearfix">
		<% if $FeaturedImage %>
			<img src="$FeaturedImage.CroppedImage(80,60).URL" alt="$Title" class="right">
		<% else_if $BackgroundImage %>
			<img src="$BackgroundImage.CroppedImage(80,60).URL" alt="$Title" class="right">
		<% end_if %>
		$Title<br>
		<em class="bloglistitem__date">$PublishDate.format("F d, Y")</em>
	</a>
</li>
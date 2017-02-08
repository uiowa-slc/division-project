<article class="bloglistitem clearfix ">
	<% if $FeaturedImage %>
		<a href="$Link" class="bloglistitem__img">
			<img src="$FeaturedImage.CroppedImage(500,333).URL" alt="$Title">
		</a>
	<% else_if $BackgroundImage %>
		<a href="$Link" class="bloglistitem__img">
			<img src="$BackgroundImage.CroppedImage(500,333).URL" alt="$Title">
		</a>
	<% end_if %>
	<div class="bloglistitem__content<% if $FeaturedImage || $BackgroundImage %>--wimage<% end_if %>">
		<% if $Categories.exists %>
			<p class="bloglistitem__category">
			<% loop $Categories %>
				<a href="$Link" class="bloglistitem__category">$Title</a><% if not Last %><% else %><% end_if %>
			<% end_loop %>
			</p>
		<% end_if %>

		<h3 class="bloglistitem__heading"><a href="$Link">$Title</a></h3>

		<% if $Summary %>
			<div class="bloglistitem__desc">$Summary</div>
		<% else %>
			<p class="bloglistitem__desc">$Content.LimitCharacters(150) <a href="$Link">Continue reading</a></p>
		<% end_if %>

		<% include ByLine %>

	</div>
</article>
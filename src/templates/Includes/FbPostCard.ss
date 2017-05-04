<article class="bloglistitem clearfix ">
	<% if $ImageSource %>
		<a href="$URL" class="bloglistitem__img border-effect">
			<img src="$ImageSource.URL" alt="$Title">
		</a>
	<% end_if %>
	<div class="bloglistitem__content<% if $ImageSource %>--wimage<% end_if %>">
		<p class="bloglistitem__category">
			<a href="$URL" class="bloglistitem__category"><i class="fa fa-facebook"></i> Via Facebook</a>
		</p>
		<p class="bloglistitem__desc">$Content</p>
		<p class="bloglistitem__date">Posted $TimePosted.NiceUS</p>
	</div>
</article>
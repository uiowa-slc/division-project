<article class="blogcard clearfix ">
	<% if $FeaturedImageURL %>
		<a href="$Link" class="blogcard__img">
			<img class="dp-lazy" data-original="$FeaturedImageURL" width="500" height="333" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="$Title">
		</a>
	<% else_if $BackgroundImage %>
		<a href="$Link" class="blogcard__img">
			<img class="dp-lazy" data-original="$BackgroundImage.FocusFill(500,333).URL" width="500" height="333" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="$Title">
		</a>
	<% else_if $YoutubeBackgroundEmbed %>
		<a href="$Link" class="blogcard__img">
			<img class="dp-lazy" data-original="http://img.youtube.com/vi/$YoutubeBackgroundEmbed/sddefault.jpg" width="500" height="333"  src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="$Title">
		</a>
	<% end_if %>
	<div class="blogcard__content<% if $FeaturedImage || $BackgroundImage || $YoutubeBackgroundEmbed %>--wimage<% end_if %>">

		<h3 class="blogcard__heading">
            <a href="$Link">$Title</a>
        </h3>

        <% if not $Parent.HideSummaries %>
    		<% if $Summary %>
    			<div class="blogcard__desc">$Summary</div>
    		<% else %>
    			<p class="blogcard__desc">$Content.LimitCharacters(150) <%-- <a href="$Link">Continue reading</a> --%></p>
    		<% end_if %>
        <% end_if %>
		<% if not $Parent.HideDatesAndAuthors %>
			<% include StudentLifeNewsByline %>
		<% end_if %>

        <% if $Categories.exists %>
            <p class="blogcard__category">
                <% loop $Categories %>
                    <a href="$Link" class="button hollow tiny secondary">$Title</a>
                <% end_loop %>
            </p>
        <% end_if %>

	</div>
</article>

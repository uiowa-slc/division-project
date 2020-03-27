
<article class="blogcard <% if $Last %>blogcard--no-border<% end_if %> clearfix">
	<% if $FeaturedImage %>
		<a href="$Link" class="blogcard__img">
			<img class="dp-lazy" data-original="$FeaturedImage.FocusFill(500,333).URL" width="500" height="333" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="$Title">
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

		<h2 class="blogcard__heading blogcard__heading--lighter">
            <a href="$Link" style="color: #005994;">$Title</a>
        </h2>


		<% if $Parent.ShowFullTopicBody %>
			<div class="blogcard__desc">
				$ContentDemotedHeadings.RAW
			</div>
		<% else %>
			<% if $Summary %>
				<div class="blogcard__desc">$Summary</div>
			<% else %>
				<p class="blogcard__desc">$Content.LimitCharacters(150) <%-- <a href="$Link">Continue reading</a> --%></p>
			<% end_if %>
		<% end_if %>



        <% if $WebsiteLink %>
        <p><a href="$WebsiteLink" target="_blank" class="button small">Visit Website <i class="fa fa-external-link" aria-hidden="true"></i></a></p>
        <% end_if %>
			<div class="byline">
				<p><em class="byline__on">Updated </em><span class="byline__on">on </span><time datetime="$LastEdited.format(c)" itemprop="datePublished">$LastEdited.format("MMMM d, y")</time></p>


			</div>

        <% if $Categories.exists %>
            <p class="blogcard__category">
                <% loop $Categories %>
                    <a href="$Link" class="button hollow tiny secondary" style="border-radius: 3px;">$Title</a>
                <% end_loop %>
            </p>
        <% end_if %>

	</div>
</article>

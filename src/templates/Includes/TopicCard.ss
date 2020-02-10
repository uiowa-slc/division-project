<article class="blogcard clearfix ">
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
			<div class="byline">
				<p><% if $Credits %>By <% loop $Credits %><% if not $First && not $Last %>, <% end_if %><% if not $First && $Last %><span class="byline__and">&nbsp;and </span><% end_if %><% if $URLSegment %><% if $BlogProfileImage %><img class="byline__profilepic" src="$BlogProfileImage.FocusFill(60,60).URL" alt="Profile image of $FirstName $Surname"><% end_if %><a href="$URL" class="byline__author"> $Name.XML</a><% else %><span class="byline__author">$Name.XML</span><% end_if %><% end_loop %>
					<% end_if %>
				<% if not $Credits && $StoryBy %>
					<em class="byline__by">By </em>
					<% if $StoryByEmail %>
						<a href="mailto:$StoryByEmail">$StoryBy</a><% if $StoryByTitle || $StoryByDept %>,<% end_if %>
					<% else %>
						$StoryBy<% if $StoryByTitle || $StoryByDept %>,<% end_if %>
					<% end_if %>
					<% if $StoryByTitle %>$StoryByTitle<% end_if %>
					<% if $StoryByDept %>$StoryByDept<% end_if %>

				<% end_if %>
				<% if not $Credits && not $StoryBy %><em class="byline__on">Updated on</em> <% else %><span class="byline__on">on </span><% end_if %><time datetime="$LastEdited.format(c)" itemprop="datePublished">$LastEdited.format("MMMM d, y")</time>. <% if $PhotosBy %><span class="byline__media">Media by <% if $PhotosByEmail %><a href="mailto:$PhotosByEmail">$PhotosBy</a><% else %>$PhotosBy<% end_if %></span><% end_if %></p>
			</div>

		<% end_if %>

	</div>
</article>

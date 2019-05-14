<div class="byline">
	<p><% if $Credits %>By <% end_if %><% loop $Credits %><% if not $First && not $Last %>, <% end_if %><% if not $First && $Last %><span class="byline__and">&nbsp;and </span><% end_if %><% if $URLSegment %><% if $BlogProfileImage %><img class="byline__profilepic" src="$BlogProfileImage.FocusFill(60,60).URL" alt="Profile image of $FirstName $Surname"><% end_if %><a href="$URL" class="byline__author"> $Name.XML</a><% else %><span class="byline__author">$Name.XML</span><% end_if %><% end_loop %>
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
	<% if not $Credits && not $StoryBy %><em class="byline__on">Posted on</em> <% else %><span class="byline__on">on </span><% end_if %><time datetime="$PublishDate.format(c)" itemprop="datePublished">$PublishDate.format("MMMM d, y")</time>. <% if $PhotosBy %><span class="byline__media">Media by <% if $PhotosByEmail %><a href="mailto:$PhotosByEmail">$PhotosBy</a><% else %>$PhotosBy<% end_if %></span><% end_if %></p>
</div>

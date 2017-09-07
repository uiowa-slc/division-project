<div class="byline">
	<p><% if $Credits %><em class="byline__by">By </em><% end_if %><% loop $Credits %><% if not $First && not $Last %>, <% end_if %><% if not $First && $Last %><span class="byline__and"> and </span><% end_if %><% if $URLSegment %><a href="$URL" class="byline__author"><% if $BlogProfileImage %> <amp-img src="$BlogProfileImage.CroppedImage(24,24).URL" width="24" height="24" alt="Profile image of $FirstName $Surname" class="byline-img"></amp-img><% end_if %> $Name.XML</a><% else %><span class="byline__author">$Name.XML</span><% end_if %><% end_loop %>
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
	<% if not $Credits && not $StoryBy %><em class="byline__on">Posted on</em> <% else %><span class="byline__on">on </span><% end_if %><time datetime="$PublishDate.format(c)" itemprop="datePublished">$PublishDate.format("F d, Y")</time> <% if $PhotosBy %><em class="blogmeta__media">Media by</em> <% if $PhotosByEmail %><a href="mailto:$PhotosByEmail">$PhotosBy</a><% else %>$PhotosBy<% end_if %><% end_if %></p>
</div>
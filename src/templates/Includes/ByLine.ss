<div class="blogmeta__byline">
	<p><% if $Credits %><em>By </em><% end_if %><% loop $Credits %><% if not $First && not $Last %>, <% end_if %><% if not $First && $Last %> and <% end_if %><% if $URLSegment %><a href="$URL"><% if $BlogProfileImage %> <img src="$BlogProfileImage.CroppedImage(24,24).URL" alt="$FirstName $Surname"><% end_if %> $Name.XML</a><% else %>$Name.XML<% end_if %><% end_loop %>
	<% if not $Credits && $StoryBy %>
		<em>By </em>
		<% if $StoryByEmail %>
			<a href="mailto:$StoryByEmail">$StoryBy</a><% if $StoryByTitle || $StoryByDept %>,<% end_if %>
		<% else %>
			$StoryBy<% if $StoryByTitle || $StoryByDept %>,<% end_if %>
		<% end_if %>
		<% if $StoryByTitle %>$StoryByTitle<% end_if %>
		<% if $StoryByDept %>$StoryByDept<% end_if %>

	<% end_if %>
	<% if not $Credits && not $StoryBy %><em>Posted on</em> <% else %>on <% end_if %><time datetime="$PublishDate.format(c)" itemprop="datePublished">$PublishDate.format("F d, Y")</time> <% if $PhotosBy %>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<em>Media by</em> <% if $PhotosByEmail %><a href="mailto:$PhotosByEmail">$PhotosBy</a><% else %>$PhotosBy<% end_if %><% end_if %></p>
</div>
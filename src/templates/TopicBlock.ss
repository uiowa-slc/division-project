
<% if $AreaName == "AfterContent" %>

<% if $Entries %>
<section class="content-block__container recentnews" aria-labelledby="Block$ID">
	<div class="content-block row">
		<div class="newsblock">
			<div class="column">
				<h3 class="newsblock-title text-center" id="Block$ID"><% if $Title && $ShowTitle %>$Title<% else %>Recent News<% end_if %></h3>
			</div>
			<ul class="medium-up-3 ">
				<% loop $Entries %>

					<li class="column column-block">
						<article class="bloglistitem clearfix ">
							<% if $FeaturedImage %>
								<a href="$Link" class="bloglistitem__img border-effect">
									<img class="dp-lazy" data-original="$FeaturedImage.CroppedImage(500,333).URL" width="500" height="333" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="$Title">
								</a>
							<% else_if $BackgroundImage %>
								<a href="$Link" class="bloglistitem__img border-effect">
									<img class="dp-lazy" data-original="$BackgroundImage.CroppedImage(500,333).URL" width="500" height="333" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="$Title">
								</a>
							<% else_if $YoutubeBackgroundEmbed %>
								<a href="$Link" class="bloglistitem__img border-effect">
									<img class="dp-lazy" data-original="http://img.youtube.com/vi/$YoutubeBackgroundEmbed/sddefault.jpg" width="500" height="333"  src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="$Title">
								</a>
							<% end_if %>
							<div class="bloglistitem__content<% if $FeaturedImage || $BackgroundImage || $YoutubeBackgroundEmbed %>--wimage<% end_if %>">
							
							<% if $Up.FilterBy == "Category" %>
								<% if $Tags.exists %>
									<p class="bloglistitem__category">
									<% loop $Tags.Limit(3) %>
										<a href="$Link" class="bloglistitem__category">$Title</a><% if not Last %><% else %><% end_if %>
									<% end_loop %>
									</p>
								<% end_if %>
							<% else %>
								<% if $Categories.exists %>
									<p class="bloglistitem__category">
									<% loop $Categories %>
										<a href="$Link" class="bloglistitem__category">$Title</a><% if not Last %><% else %><% end_if %>
									<% end_loop %>
									</p>
								<% end_if %>
							<% end_if %>

								<h3 class="bloglistitem__heading"><a href="$Link">$Title</a></h3>

								<% if $Summary %>
									<div class="bloglistitem__desc">$Summary</div>
								<% else %>
									<p class="bloglistitem__desc">$Content.LimitCharacters(150) <%-- <a href="$Link">Continue reading</a> --%></p>
								<% end_if %>

							</div>
						</article>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</div>
</section>
<% end_if %>

<% else_if $AreaName == "Sidebar" %>
<section class="content-block__container">
	<div class="content-block row column">
		<div class="">
			<div class="newsblock">
				<h2 class="newsblock__header"><% if $Title && $ShowTitle %>$Title<% else %>Recent News<% end_if %></h2>
				<ul>
					<% loop $Entries %>
						<% include RecentNewsContent %>
					<% end_loop %>
				</ul>
			</div>
		</div>
	</div>
</section>


<% else %>





<section class="content-block__container">
	<div class="content-block row column">
		<div class="newsblock">
			<h2 class="newsblock__header"><% if $Title && $ShowTitle %>$Title<% else %>Recent News<% end_if %></h2>
			<% loop $Entries %>
				<article class="bloglistitem clearfix ">
					<% if $FeaturedImage %>
						<a href="$Link" class="bloglistitem__img border-effect">
							<img class="dp-lazy" data-original="$FeaturedImage.CroppedImage(500,333).URL" width="500" height="333" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="$Title">
						</a>
					<% else_if $BackgroundImage %>
						<a href="$Link" class="bloglistitem__img border-effect">
							<img class="dp-lazy" data-original="$BackgroundImage.CroppedImage(500,333).URL" width="500" height="333" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="$Title">
						</a>
					<% else_if $YoutubeBackgroundEmbed %>
						<a href="$Link" class="bloglistitem__img border-effect">
							<img class="dp-lazy" data-original="http://img.youtube.com/vi/$YoutubeBackgroundEmbed/sddefault.jpg" width="500" height="333"  src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="$Title">
						</a>
					<% end_if %>
					<div class="bloglistitem__content<% if $FeaturedImage || $BackgroundImage || $YoutubeBackgroundEmbed %>--wimage<% end_if %>">
					
					<% if $Up.FilterBy == "Category" %>
						<% if $Tags.exists %>
							<p class="bloglistitem__category">
							<% loop $Tags.Limit(3) %>
								<a href="$Link" class="bloglistitem__category">$Title</a><% if not Last %><% else %><% end_if %>
							<% end_loop %>
							</p>
						<% end_if %>
					<% else %>
						<% if $Categories.exists %>
							<p class="bloglistitem__category">
							<% loop $Categories %>
								<a href="$Link" class="bloglistitem__category">$Title</a><% if not Last %><% else %><% end_if %>
							<% end_loop %>
							</p>
						<% end_if %>
					<% end_if %>

						<h3 class="bloglistitem__heading"><a href="$Link">$Title</a></h3>

						<% if $Summary %>
							<div class="bloglistitem__desc">$Summary</div>
						<% else %>
							<p class="bloglistitem__desc">$Content.LimitCharacters(150) <%-- <a href="$Link">Continue reading</a> --%></p>
						<% end_if %>

					</div>
				</article>
			<% end_loop %>
			<br>
		</div>
	</div>
</section>
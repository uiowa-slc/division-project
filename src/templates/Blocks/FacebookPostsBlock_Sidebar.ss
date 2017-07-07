<section class="content-block__container">
	<div class="content-block row column">
		<div class="">
			<div class="newsblock">
				<h2 class="newsblock__header"><% if $Title %>$Title<% else %>From Facebook<% end_if %></h2>
				<ul>
					<% loop $Entries.limit(3) %>
						<li>
							<a href="$URL" class="clearfix">
								<% if $ImageSource %>
									<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="$ImageSource.URL" width="$ImageSource.Width" height="$ImageSource.Height" alt="$Title">
								<% end_if %>
								$Content.LimitCharacters(100)<br>
								<em class="bloglistitem__date">$TimePosted.format("F d, Y")</em>
							</a>
						</li>
					<% end_loop %>
				</ul>
			</div>
		</div>
	</div>
</section>
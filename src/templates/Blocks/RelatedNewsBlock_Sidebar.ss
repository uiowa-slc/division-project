<section class="content-block__container">
	<div class="content-block row column">
		<div class="newsblock">
			<h2 class="newsblock__header"><% if $Title %>$Title<% else %>Related News<% end_if %></h2>
			<ul>
				<% loop $RelatedNewsEntries.limit(3) %>
					<% include RelatedNewsContent %>
				<% end_loop %>
			</ul>
		</div>
	</div>
</section>
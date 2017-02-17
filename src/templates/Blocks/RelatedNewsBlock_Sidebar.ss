<section class="content-block__container">
	<div class="content-block row column">
		<div class="">
			<div class="$CSSClasses">
				<h2 class="relatednewsblock__header"><% if $Title %>$Title<% else %>Related News<% end_if %></h2>
				<ul>
					<% loop $RelatedNewsEntries.limit(3) %>
						<% include RelatedNewsContent %>
					<% end_loop %>
				</ul>
			</div>
		</div>
	</div>
</section>
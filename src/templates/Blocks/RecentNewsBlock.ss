<section class="content-block__container">
	<div class="content-block row column">
		<div class="$CSSClasses">
			<h2 class="relatednewsblock__header"><% if $Title %>$Title<% else %>Related News<% end_if %></h2>
			<% loop $Entries.limit(3) %>
				<% include BlogCard %>
			<% end_loop %>
			<br>
		</div>
	</div>
</section>
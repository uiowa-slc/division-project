<section class="content-block__container">
	<div class="content-block row column">
		<div class="newsblock">
			<h2 class="newsblock__header"><% if $Title %>$Title<% else %>Recent News<% end_if %></h2>
			<% loop $Entries %>
				<% include BlogCard %>
			<% end_loop %>
			<br>
		</div>
	</div>
</section>
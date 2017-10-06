<section class="content-block__container" aria-labelledby="Block$ID">
	<div class="content-block row column">
		<div class="">
			<div class="newsblock">
				<h2 id="Block$ID" class="newsblock__header"><% if $Title %>$Title<% else %>Recent News<% end_if %></h2>
				<ul>
					<% loop $Entries %>
						<% include RecentNewsContent %>
					<% end_loop %>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="content-block__container" aria-labelledby="Block$ID">
	<div class="content-block row column">
		<div class="$CSSClasses">
			<h3 id="Block$ID" class="upcomingeventsblock__header"><% if $Title %>$Title<% else %>Upcoming Events<% end_if %></h3>
			<% with $CurrentPage.LocalistCalendar %>
				<% loop $EventList.Limit(3) %>
					<% include EventCard %>
				<% end_loop %>

			<% end_with %>

		</div>
		<p class="text-center"><a href="$CurrentPage.LocalistCalendar.Link" class="keep-reading">See full calendar</a></p>
	</div>
</section>

<section class="content-block__container content-block__container--padding" aria-labelledby="Block$ID">
	<div class="content-block">
		<div class="$CSSClasses">
			<div class="upcomingeventsblock__header">
				<h3 id="Block$ID" class="upcomingeventsblock__title"><% if $Title %>$Title<% else %>Upcoming Events<% end_if %></h3>
			</div>
		
			<% loop $Calendar.EventList.Limit(3) %>
				<% include EventCard %>
			<% end_loop %>

		</div>
		<div class="text-center"><a class="button-outlined" href="$Calendar.Link">See all events</a></div>
	</div>
</section>

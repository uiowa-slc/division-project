
<section class="content-block__container content-block__container--padding" aria-labelledby="Block$ID">
	<div class="content-block">
		<div class="$CSSClasses">
			<div class="upcomingeventsblock__header">
				<h3 id="Block$ID" class="upcomingeventsblock__title"><% if $Title %>$Title<% else %>Upcoming Events<% end_if %></h3>
			</div>
		
			<% if $Source == "Localist calendar on this site" %>
				<% if $Calendar.EventList.Count > 0 %>
					<% loop $Calendar.EventList.Limit(3) %>
						<% include EventCard %>
					<% end_loop %>
				<% else %>
					<p>No upcoming events currently listed.</p>
				<% end_if %>

			<% else_if $Source == "SilverStripe calendar on this site" %>

				<% if $Calendar.UpcomingEvents.Count > 0 %>
					<% loop $Calendar.UpcomingEvents.Limit(3) %>
						<% include SsEventCard %>
					<% end_loop %>
				<% else %>
					<p>No upcoming events currently listed.</p>
				<% end_if %>
			<% end_if %>

		</div>
		
	</div>
</section>

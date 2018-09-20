<% if $AreaName == "Sidebar" %>
<section class="content-block__container" aria-labelledby="Block$ID">
	<div class="content-block row column">
		<div class="$CSSClasses">
			<h3 id="Block$ID" class="upcomingeventsblock__header"><% if $Title && $ShowTitle %>$Title<% else %>Upcoming Events<% end_if %></h3>

			<% if $EventList %>
				<% loop $EventList %>
					<% include EventCard %>
				<% end_loop %>
			<% end_if %>
		</div>
		<% if $CalendarLink %>
			<p class="text-center"><a href="$CalendarLink" class="keep-reading">See all events</a></p>
		<% end_if %>

	</div>
</section>
<% else %>
<section class="content-block__container content-block__container--padding" aria-labelledby="Block$ID">
	<div class="content-block">
		<div class="$CSSClasses">
			<div class="row">
				<div class="large-12 columns">
					<div class="upcomingeventsblock__header">
						<h3 id="Block$ID" class="upcomingeventsblock__title"><% if $Title && $ShowTitle %>$Title<% else %>Upcoming Events<% end_if %></h3>
					</div>

					<% if $Source == "SilverStripe calendar on this site" %>
						<% if $Calendar.UpcomingEvents.Count > 0 %>
							<div class="row small-up-1 medium-up-2 large-up-3">
								<% loop $Calendar.UpcomingEvents.Limit(3) %>
									<div class="column column-block">
										<% include SsEventCard %>
									</div>
								<% end_loop %>
							</div>
						<% else %>
							<p>No upcoming events currently listed.</p>
						<% end_if %>
					<% else %>
						<% if $EventList %>
							<div class="row small-up-1 medium-up-2 large-up-3">
								<% loop $EventList %>
									<div class="column column-block">
										<% include EventCard %>
									</div>
								<% end_loop %>
							</div>
						<% else %>
							<p>No upcoming events currently listed.</p>
						<% end_if %>
					<% end_if %>
					<% if $CalendarLink %>
						<div class="text-center"><p><a class="button-outlined" href="$CalendarLink">See all events</a></p></div>
					<% end_if %>
					<% if $EventList.Count == 0 %>
						<div><p><a class="button-outlined" href="https://afterclass.uiowa.edu" target="_blank">See more events on campus</a></p></div>

					<% end_if %>
				</div>
	 		</div>
		</div>
	</div>
</section>

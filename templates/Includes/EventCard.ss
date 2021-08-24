<div class="eventcard">

	<%-- image --%>
	<div class="eventcard__imgwrap">
		<% if $Image.URL %>
			<a href="$Link"><div style="background-image: url($Image.ThumbURL);">$Title</div></a>
		<% else_if $Venue.ImageURL %>
			<a href="$Link"><div style="background-image: url($Venue.ImageURL);">$Title</div></a>
		<% else %>
			<a href="$Link"><div style="background-image: url({$ThemeDir}/dist/images/UiCalendarEventPlaceholder.png);">$Title</div></a>

		<% end_if %>
	</div>

	<div class="clearfix eventcard__content">
		<h3 class="eventcard__title">
			<a href="$Link">
				$Title
			</a>
		</h3>

		<%-- Dates --%>
		<% if $Dates %>
			<p class="eventcard__dates">
                <img src="{$ThemeDir}/dist/images/calendar-bw.png" alt="calendar icon">
				<% loop $Dates.Limit(1) %>
					<% include DateTimesList %>
				<% end_loop %>
			</p>
		<% else %>
				No upcoming dates.
		<% end_if %>

		<%-- Online event stuff --%>

		<% if isOnline %>

		<p><i aria-hidden="true" class="fas fa-laptop-house"></i>Online Event</p>
		<% end_if %>

		<%-- Venue --%>
		<% if $Venue %>
			<p class="eventcard__venue">
				<img src="{$ThemeDir}/dist/images/location-bw.png" alt="location icon">
                $Venue.Title
			</p>
		<% end_if %>

		<%-- Summary --%>
		<p class="eventcard__summary">$Content.Summary(30)</p>
	</div>
</div>


<div class="eventcard">

	<%-- image --%>
	<div class="eventcard-imgwrap">
		<% if $Image.URL %>
			<a href="$Link"><div style="background-image: url($Image.URL);">$Title</div></a>
			<%-- <img src="$Image.URL" alt="$Title" class="eventcard-img"> --%>
		<% else_if $Venue.ImageURL %>
			<a href="$Link"><div style="background-image: url($Venue.ImageURL);">$Title</div></a>
			<%-- <img src="$Venue.ImageURL" alt="$Venue.Title" class="eventcard-img"> --%>
		<% else %>
			<a href="$Link"><div style="background-image: url({$ThemeDir}/dist/images/UiCalendarEventPlaceholder.png);">$Title</div></a>
			<%-- <img src="{$ThemeDir}/images/LocalistEventPlaceholder.jpg" alt="$Title" class="eventcard-img"> --%>
		<% end_if %>
	</div>

	<div class="clearfix eventcard-content">
		<h5 class="eventcard-title">
			<a href="$Link">
				<span>$Title</span><% if Event.CancelReason %>
				<div class="homepage-cancel-reason">
					Note: $Event.CancelReason</div><% end_if %>
			</a>
		</h5>

		<%-- Dates --%>
		<% if $Dates %>
			<p class="eventcard-dates">
				<% loop $Dates.Limit(1) %>
					<% include DateTimesList %>
				<% end_loop %>
			</p>
		<% else %>
				No upcoming dates.
		<% end_if %>

		<%-- Venue --%>
		<% if $Venue %>
			<p class="eventcard-venue">
				$Venue.Title
			</p>
		<% end_if %>

		<%-- Summary --%>
		<p class="eventcard-summary">$Content.Summary(30)</p>
	</div>
</div>


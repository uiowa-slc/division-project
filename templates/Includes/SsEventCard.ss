<div class="eventcard">

	<%-- image --%>
	<div class="eventcard-imgwrap">
		<% if $Event.Image %>
			<a href="$Link"><div style="background-image: url($Event.Image.URL);">$Title</div></a>
			<%-- <img src="$Image.URL" alt="$Title" class="eventcard-img"> --%>
		<% else_if $Event.BackgroundImage %>
			<a href="$Link"><div style="background-image: url($Event.BackgroundImage.URL);">$Title</div></a>
			<%-- <img src="$Venue.ImageURL" alt="$Venue.Title" class="eventcard-img"> --%>
		<% else %>

		<% end_if %>
	</div>

	<div class="clearfix eventcard-content">
		<h5 class="eventcard-title">
			<a href="$Event.Link">
				<span>$Event.Title</span>
			</a>
		</h5>
		<p class="eventcard-dates">
			$DateRange
		</p>
		<%-- Venue --%>
		<% if $Location %>
			<p class="eventcard-venue">
				$Location
			</p>
		<% end_if %>

		<%-- Summary --%>
		<p class="eventcard-summary">$Content.Summary(30)</p>
	</div>
</div>


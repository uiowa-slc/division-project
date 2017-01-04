$Header
<main class="main-content__container" id="main-content__container">
	$Breadcrumbs
	<div class="column row">
		<div class="main-content__header">
			<h1>$Title</h1>
		</div>
	</div>

	$BlockArea(BeforeContent)

	<div class="row">
		<article role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">

			$BlockArea(BeforeContentConstrained)

			<div class="main-content__text">
				<div class="locallistevent">

					<% if $Dates.Count > 1 %><h5 class="event-title">Next Date:</h5><% else %><h5 class="event-title">Date and Time:</h5><% end_if %>
					<% if $Dates %>
						<% loop $Dates.Limit(1) %>
							<% include DateTimesList %>
						<% end_loop %>
					<% else %>
							No upcoming dates.
					<% end_if %>

					<%-- Venue --%>
					<% if $Venue.Title %>
						<h5 class="event-title">Venue:</h5>
						<p class="event-venue">$Venue.Title
						<% if $Venue.Address %><br>$Venue.Address<% end_if %>
						<% if $Venue.WebsiteLink %><br><a href="$Venue.WebsiteLink">View Map</a><% end_if %>
						</p>
					<% end_if %>

					<%-- Content --%>
					<% if $Content %>
						<h5 class="event-title">Event Description</h5>
						$Content
					<% end_if %>

					<%-- Link to events.uiowa.edu --%>
					<p><strong>Link to events.uiowa:</strong><br>
						<a href="$LocalistLink">View event on events.uiowa.edu</a>
					</p>

					<%-- Contact Info --%>
					<% if $ContactName %>
						<h5 class="event-title">Contact Name:</h5>
						<p>$ContactName</p>
					<% end_if %>

					<% if $ContactEmail %>
						<h5 class="event-title">Contact Email:</h5>
						<p><a href="mailto:$ContactEmail">$ContactEmail</a></p>
					<% end_if %>


					<% if $Cost %>
						<p><strong>Cost:</strong> $Cost </p>
					<% end_if %>

					<% if $Sponsor %>
						<p><strong>Sponsor:</strong><br> $Sponsor </p>
					<% end_if %>

					<% if $MoreInfoLink %>
						<p><a href="$MoreInfoLink" target="_blank" class="btn btn-default">More information</a></p>
					<% end_if %>

					<%-- Upcoming Dates --%>
					<% if $Dates.Count > 1 %>
						<h5 class="event-title">All Dates</h5>
						<ul>
						<% loop $Dates %>
							<li class="$FirstLast">
								<% include DateTimesList %>
							</li>
						<% end_loop %>
						</ul>
					<% end_if %>

					<% if $Image %>
						<img src="$Image.URL" alt="$Title" class="event-img">
					<% else_if $Venue.ImageURL %>
						<img src="$Venue.ImageURL" alt="$Title" class="event-img">
					<% end_if %>
					<p><a href="{$LocalistLink}.ics">Add to iCal or Outlook</a></p>

				</div>

		</article>
		<aside class="sidebar" data-sticky-container>
			<% include SideNav %>
			$BlockArea(Sidebar)
		</aside>
	</div>
</main>

<% if RelatedEvents %>
	<div class="relatedevents">
		<h2 class="relatedevents-title text-center">Related Events</h2>
		<ul class="column row small-up-2 medium-up-3 ">
			<% loop RelatedEvents.Limit(3) %>
				<li class="column column-block">
					<% include EventCard %>
				</li>
			<% end_loop %>
		</ul>
	</div>
<% end_if %>
$Header
<main class="main-content__container" id="main-content__container">
	$Breadcrumbs
	<div class="column row">
		<div class="main-content__header">
			<h1>$Title</h1>
		</div>
	</div>

	$BeforeContent

	<div class="row">
		<article role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) || $Sidebar ||  $SidebarView.Widgets %>main-content--with-sidebar<% end_if %>">

			$BeforeContentConstrained

			<div class="main-content__text">
				<div class="locallistevent">
					<% if $Image.URL %>
						<div style="background-image: url($Image.URL);" class="locallistevent__img"></div>
					<% end_if %>

					<%-- Content --%>
					<% if $Content %>
						$Content
					<% end_if %>

					<% if $Dates.Count > 1 %><h5 class="event-title">Next Date:</h5><% else %><h5 class="event-title">Date and Time:</h5><% end_if %>
					<% if $Dates %>
						<% loop $Dates.Limit(1) %>
							<% include DateTimesList %>
						<% end_loop %>
					<% else %>
							No upcoming dates.
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

				</div>
				<div class="ADA_statement">
				<p> <i>Individuals with disabilities are encouraged to attend all University of Iowa–sponsored events. If you are a person with a disability who requires a reasonable accommodation in order to participate in this program, please contact {$ContactName} in advance at {$ContactPhone} or {$ContactEmail}
				</i></p>
			</div>
			</div>
		</article>
		<aside class="sidebar" data-sticky-container>
			<div class="locallistevent__sidebar">
				<% if $Venue.Title %>
					<p class="event-venue"><strong>Venue:</strong><br />$Venue.Title
					<% if $Venue.Address %><br>$Venue.Address<% end_if %>
					<% if $Venue.WebsiteLink %><br><a href="$Venue.WebsiteLink">View Map</a><% end_if %>
					</p>
				<% end_if %>

				<% if $ContactName %>
					<p><strong>Contact Name:</strong><br /> $ContactName</p>
				<% end_if %>

				<% if $ContactEmail %>
					<p><strong>Contact Email:</strong><br /> <a href="mailto:$ContactEmail">$ContactEmail</a></p>
				<% end_if %>

				<% if $Cost %>
					<p><strong>Cost:</strong><br /> $Cost </p>
				<% end_if %>

				<% if $Sponsor %>
					<p><strong>Sponsor:</strong><br /> $Sponsor </p>
				<% end_if %>

				<% if $MoreInfoLink %>
					<p><a href="$MoreInfoLink" target="_blank" class="btn btn-default">Website</a></p>
				<% end_if %>

				<%-- <div class="">
					<p><a href="{$LocalistLink}.ics">Add to iCal or Outlook</a></p>
				</div> --%>

				<% if $Tags %>
					<p class="locallistevent__tags"><strong>Tags</strong><br />
					<% loop $Tags %>
						<a href="$Link" class="$FirstLast">$Title</a>
					<% end_loop %>
					</p>
				<% end_if %>
				<% if $UiCalendarLink %>
					<a href="$UiCalendarLink" target="_blank">View on the UI calendar <i class="fa fa-external-link" aria-hidden="true"></i></a>
				<% end_if %>

			</div>

		</aside>
	</div>
</main>
<br /><br /><br />
<% if RelatedEvents %>
	<div class="relatedevents">
		<h2 class="relatedevents-title text-center">Related Events</h2>
		<ul class="column row medium-up-3 ">
			<% loop RelatedEvents.Limit(3) %>
				<li class="column column-block">
					<% include EventCard %>
				</li>
			<% end_loop %>
		</ul>
	</div>
<% end_if %>
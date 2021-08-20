$Header
<main class="main-content__container" id="main-content__container">
	
	<% if $BackgroundImage %>
		<% include FeaturedImage %>
	<% end_if %>
	<% if not $BackgroundImage %>

    <% include MainContentHeader %>

	$BeforeContent

	<div class="row">
		<article class="main-content main-content--with-padding <% if $Children || $Menu(2) || $Sidebar ||  $SidebarView.Widgets %>main-content--with-sidebar<% end_if %>">

			$BeforeContentConstrained

			<div class="main-content__text">
				<div class="locallistevent">

					  <% with CurrentDate %>
					  <p><strong>Date: </strong>$DateRange<% if AllDay %> <% _t('Calendar.ALLDAY','All Day') %><% else %><% if StartTime %> $TimeRange<% end_if %><% end_if %></p>
					  <p><a href="$ICSLink" class="button"><% _t('CalendarEvent.ADD','Add this to Calendar') %></a></p>
					  <% end_with %>
						<% if $Location %>
							<p><strong>Location:</strong><br />$Location
							</p>
						<% end_if %>
						  <% if OtherDates %>
						  <div class="event-calendar-other-dates">
							<h5 class="event-title">All Dates</h5>
						    <ul>
						      <% loop OtherDates %>
						      <li><a href="$Link" title="$Event.Title">$DateRange<% if AllDay %> <% _t('Calendar.ALLDAY','All Day') %><% else %><% if StartTime %> $TimeRange<% end_if %><% end_if %></a></li>
						      <% end_loop %> 
						    </ul>
						  </div>
						  <% end_if %>
					<%-- Content --%>
					<% if $Content %>
						$Content
					<% end_if %>
				</div>
			</div>
		</article>
		<aside class="sidebar" class="dp-sticky">
			<div class="locallistevent__sidebar">
				<% if $Location %>
					<p><strong>Venue:</strong><br />$Location
					</p>
				<% end_if %>
			</div>

		</aside>
	</div>
</main>

$Header
<main class="main-content__container" id="main-content__container">
    <% include MainContentHeader %>
	$BeforeContent

	<div class="row">
		<article class="main-content main-content--with-padding <% if $Children || $Menu(2) || $Sidebar ||  $SidebarView.Widgets %>main-content--with-sidebar<% end_if %>">

			$BeforeContentConstrained

			<div class="main-content__text">
				<% if $Image.URL %>
                    <img src="$Image.URL" class="locallistevent-img left" loading="lazy" alt="$Title">
				<% end_if %>

				<%-- Content --%>
				<% if $Content %>
					$Content
				<% end_if %>

				<% if $Dates.Count > 1 %>
                    <hr />
                    <h5>Next Date:</h5>
                    <% else %>
                    <hr />
                    <h5>Date and Time:</h5>
                <% end_if %>

				<% if $Dates %>
					<% loop $Dates.Limit(1) %>
						<% include DateTimesList %>
					<% end_loop %>
				<% else %>
						No upcoming dates.
				<% end_if %>

				<%-- Upcoming Dates --%>
				<% if $Dates.Count > 1 %>
                    <hr />
					<h5>All Dates</h5>
					<ul>
					<% loop $Dates %>
						<li class="$FirstLast">
							<% include DateTimesList %>
						</li>
					<% end_loop %>
					</ul>
				<% end_if %>

				<div class="ADA_statement">
                    <br />
				    <p><i>Individuals with disabilities are encouraged to attend all University of Iowa–sponsored events. If you are a person with a disability who requires a reasonable accommodation in order to participate in this program, please contact {$ContactName} in advance at {$ContactPhone} or {$ContactEmail}
				    </i></p>
                </div>
			</div>
		</article>
		<aside class="sidebar" data-sticky-container>
			<div class="locallistevent-sidebar">
				<% if $Venue.Title %>
					<p><strong>Venue:</strong><br />$Venue.Title
					<% if $Venue.Address %><br>$Venue.Address<% end_if %>
					<% if $Venue.WebsiteLink %><br><a href="$Venue.WebsiteLink">View Map</a><% end_if %>
					</p>
				<% end_if %>
				<% if isOnline %>

				<p><i aria-hidden="true" class="fas fa-laptop-house"></i>Online Event</p>
				<% end_if %>
                    <% if $OnlineLocationUrl %>
                        <% if $OnlineLocationType == "Zoom" %>
                            <p><a class="button small hollow black" href="$OnlineLocationUrl" rel="noopener" target="_blank">Zoom link <i aria-hidden="true" class="fas fa-video"></i></a></p>
                        <% else %>
                            <p><a class="button small hollow black" href="$OnlineLocationUrl" rel="noopener" target="_blank">Online event link<i aria-hidden="true" class="fas fa-external-link-alt"></i></a></p>
                        <% end_if %>
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
					<p class="margin-0"><a href="$MoreInfoLink" target="_blank" class="button small hollow black">Website <i class="fa fa-external-link-alt" aria-hidden="true"></i></a></p>
				<% end_if %>

				<% if $Tags %>
					<p class="locallistevent-tags"><strong>Tags</strong><br />
					   <% loop $Tags %>
					       <a href="$Link" class="button small $FirstLast">$Title</a>
					   <% end_loop %>
					</p>
				<% end_if %>

				<% if $UiCalendarLink %>
					<a href="$UiCalendarLink" class="button small hollow black" target="_blank">View on the UI calendar <i class="fa fa-external-link-alt" aria-hidden="true"></i></a>
				<% end_if %>

			</div>

		</aside>
	</div>
</main>

<section class="content-block__container upcoming-events $BlockColor" aria-labelledby="Block$ID">
    <div class="grid-container">
        <div class="card__head">
            <h2 class="text-center serif text-semibold h1" id="Block$ID">
                <% if $Title && $ShowTitle %>$Title<% else %>Upcoming Events<% end_if %>
            </h2>
            <!-- Link to all news button -->
            <% if $CalendarLink %>
                <a href="$CalendarLink" class="button black clear">View All Events <i class="fas fa-arrow-right"></i></a>
            <% end_if %>
        </div>

        <div class="card__wrapper <% if $ShowStacked %>flex-dir-column<% end_if %>">
            <% if $EventList %>
                <% loop $EventList %>
                    <div class="card
                        <% if $Up.ShowStacked %> card--horizontal<% else %> card--row<% end_if %> 
                        <% if $Up.Enclosed %> card--enclosed<% end_if %> ">
                        <% if not $Up.HideImages %>
                            <div class="card__media upcoming-events__media">
                                <% if $Image.URL %>
                                    <a href="$Link" style="background-image: url($Image.ThumbURL);" >
                                        <span class="show-for-sr">$Title</span>
                                    </a>
                                <% else_if $Venue.ImageURL %>
                                    <a href="$Link" style="background-image: url($Venue.ImageURL);" >
                                        <span class="show-for-sr">$Title</span>
                                    </a>
                                <% else %>
                                    <a href="$Link" style="background-image: url({$ThemeDir}/dist/images/UiCalendarEventPlaceholder.png);" >
                                        <span class="show-for-sr">$Title</span>
                                    </a>
                                <% end_if %>
                            </div>
                        <% end_if %>
                        
                    <div class="card__body <% if $Up.HideImages %>card__body--noimage<% end_if %>">
                            <h3 class="card__title">
                                <a href="$Link">$Title</a>
                            </h3>
                    
                            <%-- Dates --%>
                            <% if $Dates %>
                                <p class="">
                                    <img src="{$ThemeDir}/dist/images/calendar-bw.png" alt="calendar icon" width="16">
                                    <% loop $Dates.Limit(1) %>
                                        <% include DateTimesList %>
                                    <% end_loop %>
                                </p>
                            <% else %>
                                    No upcoming dates.
                            <% end_if %>
                    
                            <%-- Venue --%>
                            <% if $Venue %>
                                <p class="">
                                    <img src="{$ThemeDir}/dist/images/location-bw.png" alt="location icon" width="16">
                                    $Venue.Title
                                </p>
                            <% end_if %>

                            <%-- Summary --%>
                            <p class="card__summary">$Content.FirstParagraph.LimitCharacters(130)</p>
                    
                        </div><!-- end .card__body -->
                    </div><!-- end .card -->
                <% end_loop %>
            <% else %>
                <div class="card">
                    <p class="text-center">No events currently listed.</p>
                </div>
            <% end_if %>
        </div><!-- end .card__wrapper -->

    </div>
</section>

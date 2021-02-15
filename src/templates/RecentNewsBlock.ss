<section class="content-block__container $BlockColor" aria-labelledby="Block$ID">
    <div class="grid-container">
        <div class="card__head">
            <h2 class="text-center serif text-semibold h1" id="Block$ID">
                <% if $Title && $ShowTitle %>$Title<% else %>Recent News <% end_if %>
            </h2>
            <!-- Link to all news button -->
            <% if $NewsLink %>
                <a href="$NewsLink" class="button black clear">View All News <i class="fas fa-arrow-right"></i></a>
            <% end_if %>
        </div>

        <div class="card__wrapper <% if $ShowStacked %>flex-dir-column<% end_if %>">
            <% loop $Entries %>
                <div class="card
                    <% if $Up.ShowStacked %> card--horizontal<% else %> card--row<% end_if %>
                    <% if $Up.Enclosed %> card--enclosed<% end_if %> ">
                    <% if not $Up.HideImages %>
                        <% if $FeaturedImage %>
                            <div class="card__media">

                                <a href="$Link" class="">
                                    <img src="$FeaturedImage.FocusFill(500,280).URL" class="card__img" loading="lazy" <% if $FeaturedImageAltText %> alt="$FeaturedImageAltText" <% else %> alt="$Title" role="presentation" <% end_if %>>
                                </a>
                            </div>
                        <% end_if %>
                    <% end_if %>

                <div class="card__body <% if $Up.HideImages %>card__body--noimage<% end_if %>">
                        <h3 class="card__title">
                            <a href="$Link">$Title</a>
                        </h3>

                        <% if not $Parent.HideDatesAndAuthors %>
                            <div class="card__author">
                                <% include AuthorBylineFull %>
                            </div>
                        <% end_if %>

                        <% if not $Parent.HideSummaries %>
                            <% if $Summary %>
                                <div class="card__summary">$Summary</div>
                            <% else %>
                                <p class="card__summary">$Content.FirstParagraph.LimitCharacters(140)</p>
                                <% if not $Up.Enclosed && $Up.BlockColor != "bg--white" %>
                                    <a href="$Link" class="button black" aria-label="Continue reading about $Title">Continue Reading <i class="fas fa-arrow-right"></i></a>
                                <% else %>
                                    <a href="$Link" class="button hollow" aria-label="Continue reading about $Title">Continue Reading <i class="fas fa-arrow-right"></i></a>
                                <% end_if %>
                            <% end_if %>
                        <% end_if %>

                    </div><!-- end .card__body -->
                </div><!-- end .card -->

            <% end_loop %>
        </div><!-- end .card__wrapper -->

    </div>
</section>

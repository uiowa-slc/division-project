<div class="card card__row <% if $Parent.Enclosed %>card--enclosed<% end_if %>">
    <div class="card__media">
        <% if $FeaturedImage %>
            <a href="$Link" class="">
                <img src="$FeaturedImage.FocusFill(500,333).URL" class="card__img" loading="lazy" <% if $FeaturedImageAltText %> alt="$FeaturedImageAltText" <% else %> alt="$Title" role="presentation" <% end_if %>>
            </a>
        <% else_if $BackgroundImage %>
            <a href="$Link" class="">
                <img src="$FeaturedImage.FocusFill(500,333).URL" loading="lazy" alt="$Title" class="card__img">
            </a>
        <% end_if %>
    </div>

    <div class="card__body">
        <h3 class="card__title">
            <a href="$Link">$Title</a>
        </h3>

        <% if not $Parent.HideDatesAndAuthors %>
            <% include Author %>
        <% end_if %>

        <% if not $Parent.HideSummaries %>
            <% if $Summary %>
                <div class="card__summary">$Summary</div>
            <% else %>
                <p class="card__summary">$Content.FirstSentence</p>

            <% end_if %>
        <% end_if %>

        <a href="$Link" class="button hollow" aria-label="Continue reading about $Title">Continue Reading <i class="fas fa-arrow-right"></i></a>

    </div>
</div>

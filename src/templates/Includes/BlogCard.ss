<article class="card card__row card--enclosed">
    <div class="card__media">
        <% if $FeaturedImage %>
            <a href="$Link" class="">
                <img src="$FeaturedImage.FocusFill(500,333).URL" class="card__img" loading="lazy" <% if $FeaturedImageAltText %> alt="$FeaturedImageAltText" <% else %> alt="" role="presentation" <% end_if %>>
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
                <div class="">$Summary</div>
            <% else %>
                <p class="">
                    $Content.FirstParagraph.LimitCharacters(150)
                </p>
                <a href="$Link" class="button hollow">Continue Reading <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span></a>
            <% end_if %>
        <% end_if %>

    </div>
</article>

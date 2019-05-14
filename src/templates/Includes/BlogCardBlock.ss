<article class="blogcard clearfix ">
    <div class="blogcard__content">
        <h3 class="blogcard__heading">
            <a href="$Link">$Title</a>
        </h3>

        <% if not $Parent.HideSummaries %>
            <% if $Summary %>
                <div class="blogcard__desc">$Summary</div>
            <% else %>
                <p class="blogcard__desc">$Content.LimitCharacters(150) <%-- <a href="$Link">Continue reading</a> --%></p>
            <% end_if %>
        <% end_if %>
        <% if not $Parent.HideDatesAndAuthors %>
            <% include ByLine %>
        <% end_if %>

    </div>
</article>

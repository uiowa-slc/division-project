<div class="row">
    <div class="small-12 columns">

        <div class="ifp-block">
            <% loop $Links %>
                <a href="$Link" class="ifp-block__link">
                    <img src="$Icon.URL" class="ifp-block__icon" alt="" role="presentation" />

                    <h2 class="ifp-block__heading"><% if $Title %>$Title<% else %>$Page.Title<% end_if %></h2>
                    <% if $Summary %><p class="ifp-block__summary">$Summary</p><% end_if %>
                    <p><span class="button small hollow"><% if $LinkText %>$LinkText <% else %>Continue reading<% end_if %></span></p>

                </a>
            <% end_loop %>
        </div>

    </div>
</div>

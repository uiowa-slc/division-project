<% if not $BackgroundImage %>
    <div class="row column <% if $VisuallyHideTitle %>show-for-sr<% end_if %>">
        <div class="main-content__header">
            $Breadcrumbs
            <h1>$Title</h1>
        </div>
    </div>
<% end_if %>

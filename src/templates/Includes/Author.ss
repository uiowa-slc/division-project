<div class="card__author">
<% if $Credits %>By <% loop $Credits %><% if not $First && not $Last %>, <% end_if %><% if not $First && $Last %>&nbsp;and <% end_if %> $Name.XML<% end_loop %>
<% end_if %>
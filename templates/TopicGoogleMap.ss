<% if $Address %>
<iframe
  class="topic__google-map"
  width="300"
  height="300"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key={$GoogleAPIKey}
    &q=$Address" allowfullscreen>
</iframe>
<% end_if %>
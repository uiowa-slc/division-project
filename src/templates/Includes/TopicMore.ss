<div class="grid-x more-topics-container">

    <div class="cell">
      <% if $TermPlural %>
        <h2 style="margin-top: 0; margin-bottom: 0;">More {$TermPlural.Lowercase}:</h2>
      <% else %>
        <h2 style="margin-top: 0; margin-bottom: 0;">More:</h2>
      <% end_if %>
  </div>
  <div class="cell">
      $TopicSearchFormSized("medium")
  </div>

</div>



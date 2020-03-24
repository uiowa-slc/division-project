      <div class="more-topics-container">
        <div class="grid-x large-up-2">
          <div class="cell">
            <% if $TermPlural %>
              <h2 style="margin-top: 0; margin-bottom: 0;">More {$TermPlural}:</h2>
            <% else %>
              <h2 style="margin-top: 0; margin-bottom: 0;">More:</h2>
            <% end_if %>
        </div>
        <div class="cell">
            $TopicSearchForm
        </div>
      </div>
    </div>



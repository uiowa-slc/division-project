
  <section class="topicholder-featured topicholder-section topicholder-section--light-gray">
      <div class="grid-container grid-container--wpadding">
        <div class="row">
            <div class="column row large-8">
                <% if $TermPlural %>
                  <h2 class="topicholder-section__heading">Recently updated $TermPlural.LowerCase</h2>
                <% else %>
                  <h2 class="topicholder-section__heading">Recently updated</h2>
                <% end_if %>


                  <% loop $BlogPosts.Limit(4).Sort('LastEdited DESC') %>
                    <div class="column large-6">
                        <% include TopicCardSummary %>
                    </div>
                  <% end_loop %>



            </div>
          </div>

    </div>
</section>


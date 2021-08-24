
  <section class="topicholder-featured topicholder-section topicholder-section--light-gray">
      <div class="grid-container">
        <div class="row column">

                <% if $TermPlural %>
                  <h2 class="topicholder-section__heading">Recently updated $TermPlural.LowerCase</h2>
                <% else %>
                  <h2 class="topicholder-section__heading">Recently updated</h2>
                <% end_if %>

                <div class="row small-up-1 medium-up-2">

                      <% loop $BlogPosts.Limit(2).Sort('LastEdited DESC') %>
                        <div class="column column-block">
                          <% include TopicCardSummary %>
                          </div>
                      <% end_loop %>

              </div>



          </div>

    </div>
</section>


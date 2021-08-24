
<%-- This template is just meant to show a full list of topics sorted by
category (preferred) or if there aren't any categories, then sort by tags. --%>

<% if $AllCats.Count > 1 %>
      <section class="topicholder-section topicholder-section--gray">
        <div class="grid-container">
          <div class="row column">


                <% if $TermPlural %>
                  <h2 class="topicholder-section__heading">Browse $TermPlural.LowerCase by category:</h2>
                <% else %>
                  <h2 class="topicholder-section__heading">Browse by category:</h2>
                <% end_if %>

                 <ul class="topicholder-all-list">
                   <% loop $AllCats.Sort('Title ASC') %>
                    <% if $BlogPosts %>
                      <li class="topicholder-all-list__item topicholder-all-list__item--avoid-break"><h3 class="topicholder-all-list__item-heading"><a href="$Link">$Title</a></h3>

                        <ul class="topicholder-sublist">
                          <% loop $BlogPosts.Sort('Title ASC') %>
                            <li class="topicholder-sublist__item"><a href="$Link">$Title</a></li>
                          <% end_loop %>
                        </ul>

                        </li>
                        <% end_if %>
                    <% end_loop %>

                </ul>
            </div>

        </div>

      </section>
 <% else_if $AllTags.Count > 1 %>
      <section class="topicholder-section topicholder-section--gray">
        <div class="grid-container">
          <div class="row column">


                <% if $TermPlural %>
                  <h2 class="topicholder-section__heading">Browse $TermPlural.LowerCase by:</h2>
                <% else %>
                  <h2 class="topicholder-section__heading">Browse by:</h2>
                <% end_if %>

                 <ul class="topicholder-all-list">
                   <% loop $AllTags.Sort('Title ASC') %>
                   <% if $BlogPosts %>
                      <li class="topicholder-all-list__item topicholder-all-list__item--avoid-break"><h3 class="topicholder-all-list__item-heading"><a href="$Link">$Title</a></h3>

                        <ul class="topicholder-sublist">
                          <% loop $BlogPosts.Sort('Title ASC') %>
                            <li class="topicholder-sublist__item"><a href="$Link">$Title</a></li>
                          <% end_loop %>
                        </ul>

                        </li>
                    <% end_if %>
                    <% end_loop %>

                </ul>
          </div>
        </div>

      </section>


<% else_if not $ShowAllTopicsByLetter %>

        <% include TopicLetterBrowser %>

<% end_if %>

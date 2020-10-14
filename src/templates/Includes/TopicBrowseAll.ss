

<% if $AllCats.Count > 1 %>
      <section class="topicholder-section topicholder-section--gray">
        <div class="grid-container grid-container--wpadding">
          <div class="grid-x grid-padding-x">
            <div class="cell small-12 large-1 show-for-medium"></div>
            <div class="cell large-11">
                <% if $TermPlural %>
                  <h2 class="topicholder-section__heading">Browse all $TermPlural.LowerCase</h2>
                <% else %>
                  <h2 class="topicholder-section__heading">Browse all</h2>
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
        </div>

      </div>
 <% else_if $AllTags.Count > 1 %>
      <section class="topicholder-section topicholder-section--gray">
        <div class="grid-container grid-container--wpadding">
          <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-1 hide-for-large"></div>
            <div class="cell medium-11">
                <% if $TermPlural %>
                  <h2 class="topicholder-section__heading">Browse all $TermPlural.LowerCase</h2>
                <% else %>
                  <h2 class="topicholder-section__heading">Browse all</h2>
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
        </div>

      </div>


<% else %>

      <section class="topicholder-section topicholder-section--gray">
        <div class="grid-container grid-container--wpadding">
          <div class="grid-x grid-padding-x">
            <div class="cell">
                <% if $TermPlural %>
                  <h2 class="topicholder-section__heading">Browse all $TermPlural.LowerCase</h2>
                <% else %>
                  <h2 class="topicholder-section__heading">Browse all</h2>
                <% end_if %>
                 <ul class="topicholder-all-list">
                   <% loop $TopicsByLetter %>
                        <li class="topicholder-all-list__item topicholder-all-list__item--avoid-break"><h3 class="topicholder-all-list__item-heading">$Letter</h3>
                      <% if $Topics %>
                        <ul class="topicholder-sublist">
                      <% loop $Topics %>
                          <li class="topicholder-sublist__item"><h3 class="topicholder-sublist__heading" ><a href="$Link">$Title</a></h3></li>
                      <% end_loop %>
                      </ul>
                      <% end_if %>
                    </li>
                    <% end_loop %>
                </ul>
            </div>
          </div>
        </div>
      </div>

<% end_if %>

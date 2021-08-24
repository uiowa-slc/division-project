<section class="topicholder-section topicholder-section--gray">
  <div class="grid-container">
    <div class="row">
      <div class="column">
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
</section>

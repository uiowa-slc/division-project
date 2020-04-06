  <div class="topic-browse-by-filter">

      <% if $AllCats || $AllTags %>
        <div class="topic-browse-by-filter__grid topic-browse-by-filter__grid--full">
          <div class="topic-browse-by-filter__item topic-browse-by-filter__item">
          <% if $TermPlural %>
            <h2 id="browse-categories" class="topicholder-section__heading">Browse $TermPlural by...</h2>
          <% else %>
            <h2 id="browse-categories" class="topicholder-section__heading">Browse by...</h2>
          <% end_if %>
          </div>
        </div>
        <div class="topic-browse-by-filter__grid topic-browse-by-filter__grid--large"  data-equalizer>
        <% loop $AllCats.Sort('Title ASC') %>
            <div class="topic-browse-by-filter__item margin-bottom-1" data-equalizer-watch><a href="$Link" class="button hollow secondary button--flex-full button--skinny"><span class="topicholder-cat-inner">$Title&nbsp;<span style="topicholder-cat-inner__count">({$BlogPosts.Count})</span></span></a></div>
        <% end_loop %>
        <% loop $AllTags.Sort('Title ASC') %>
            <div class="topic-browse-by-filter__item large-4 margin-bottom-1" data-equalizer-watch><a href="$Link" class="button hollow secondary button--flex-full button--skinny"><span class="topicholder-cat-inner">$Title&nbsp;<span style="topicholder-cat-inner__count">({$BlogPosts.Count})</span></span></a></div>
          <% end_loop %>
        </div>
      <% end_if %> 




</div>
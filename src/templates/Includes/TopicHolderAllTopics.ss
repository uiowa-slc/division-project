<p class="text-center show-for-medium">Filter topics:</p>
<ul class="tabs" data-tabs id="topic-tabs">
<%-- KEEP WEIRD LI SPACING BELOW, PLEASE: --%>
  <li class="tabs-title is-active"><a class="topic-single__filter-tab" href="#panel1" aria-selected="true">Category</a></li><li class="tabs-title"><a class="topic-single__filter-tab" href="#panel3">All topics by title</a>
  </li>
</ul>


<div class="tabs-content" data-tabs-content="topic-tabs">
  <div class="tabs-panel is-active" id="panel1">
    <h2 class="topic-list__heading">Topics by category:</h2>
      <div class="row small-up-2 large-up-3"> 
        <% loop $AllCats.Sort('Title ASC') %>
          <div class="column column-block">
            <h3>$Title</h3>
            <% if $BlogPosts %>
              <ul class="topic-list">
              <% loop $BlogPosts.Limit(5) %>
                  <li class="topic-list__item"><i class="fa fa-file" aria-hidden="true"></i> <a href="$Link">$Title.LimitCharacters(20)</a></li>
                <% end_loop %>
                <% if $BlogPosts.Count > 5 %>
                 <li class="topic-list__item"><a class="topic-list__see-more" href="$Link">See more...</a></li>
                <% end_if %>
                </ul>
              <% else %>
                <p>No topics currently listed.</p>
            <% end_if %>
          </div>
        <% end_loop %>
      </div>
  </div>
  <div class="tabs-panel" id="panel3">
    <h2 class="topic-list__heading">All topics by title:</h2>
      <ul class="topic-list topic-list--three-columns">
        <% loop $TopicsByLetter %>
          <li class="topic-list__item"><h4>$Letter</h4></li>
          <% loop $Topics %>
            <li class="topic-list__item"><i class="fa fa-file" aria-hidden="true"></i> <a href="$Link">$Title.LimitCharacters(20)</a></li>
          <% end_loop %>
        <% end_loop %>
      </ul>
  </div>
</div>












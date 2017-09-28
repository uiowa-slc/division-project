<section class="content-block__container">
  <div class="content-block row column">
  <div>
    <% if $BackgroundImage %>
      <div class="background-image" data-interchange="[$BackgroundImage.CroppedFocusedImage(600,400).URL, small], [$BackgroundImage.CroppedFocusedImage(1600,500).URL, medium]">
        <div class="column row">
          <div class="background-image__header background-image__header--has-content">
            <h1 class="background-image__title text-center">$Title</h1>
            <div class="topic-search__container row">
              <div class="large-9 columns large-centered">
                <h2 class="text-center"><% if $Heading %>$Heading <% else %>Search for a topic below:<% end_if %></h2>
                  $TopicSearchForm
              </div>
            </div>           
          </div>
        </div>
     </div>
   <% end_if %>

      <% if not $BackgroundImage %>
        <div class="topic-search__container row">
          <div class="large-9 columns large-centered">
            <h2 class="text-center"><% if $TopicHolder.Heading %>$TopicHolder.Heading <% else %>Search for a topic below:<% end_if %></h2>
                $TopicSearchForm
                <div class="row small-up-2 large-up-3">
                <% with TopicHolder %>
                <% loop $AllCats.Sort('RAND()').Limit(3) %>
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
                        <p><% if $TopicHolder.NoTopicsText %>$TopicHolder.NoTopicsText <% else %>No jobs are currently listed.<% end_if %></p>
                    <% end_if %>
                  </div>
                <% end_loop %>
                <% end_with %>
                </div>
          </div>
        </div>
      <% end_if %>
  </div>
  </div>
</section>
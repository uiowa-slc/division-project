$Header
<main class="main-content__container" id="main-content__container">


    <div class="column row">
        <div class="main-content__header">
        <% if not $BackgroundImage %>
            $Breadcrumbs
            <h1>$Title</h1>
        <% end_if %>
            <div class="blogmeta">
                <% if $Parent.ShowLastUpdated && $LastEdited.TimeDiff < 604800 %>

                    <div class="byline">
                        <p>
                            <span class="byline__on">Updated on: $LastEdited.format("MMMM d, y")</span>
                            <% if $Categories.Count == 1 %><br />
                                <% loop $Categories.Limit(1) %>Filed under: <a href="$Link" class="topic-single__byline-cat">$Title</a><% end_loop %>
                            </p><% end_if %>
                    </div>

                <% end_if %>
                <ul class="social-icons">
                    <li><a href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=$AbsoluteLink', '_blank', 'width=400,height=500');void(0);"  title="Share on Facebook"><img src="{$ThemeDir}/dist/images/icon_facebook.png" alt="Share on Facebook"></a>
                    </li>
                    <li><a href="https://twitter.com/intent/tweet?text=$AbsoluteLink" title="Share on Twitter" target="_blank"><img src="{$ThemeDir}/dist/images/icon_twitter.png" alt="Share on Twitter"></a></li>
                    <li><a href="javascript:window.open('https://www.linkedin.com/cws/share?url=$AbsoluteLink', '_blank', 'width=400,height=500');void(0);" title="Share on LinkedIn" target="_blank"><img src="{$ThemeDir}/dist/images/icon_linkedin.png" alt="share on linkedid"></a></li>
                </ul>
            </div>
        </div>
    </div>


  $BeforeContent

  <div class="row">
    <article role="main" class="main-content main-content--with-padding">
      $BeforeContentConstrained
      <div class="main-content__text">
        <% if $FeaturedImage %>

            <%-- if portrait or square --%>
            <% if FeaturedImage.Orientation == 1 || $FeaturedImage.Orientation == 0 %>
              <p><img class="dp-lazy right" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="$FeaturedImage.ScaleWidth(400).URL" <% if $FeaturedImageAltText %> alt="$FeaturedImageAltText" <% else %> alt="" role="presentation" <% end_if %>width="400" height="$FeaturedImage.ScaleWidth(400).Height" /></p>
            <% end_if %>

            <%-- if landscape --%>
            <% if FeaturedImage.Orientation == 2 %>
              <p><img class="dp-lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="$FeaturedImage.ScaleWidth(860).URL" <% if $FeaturedImageAltText %> alt="$FeaturedImageAltText" <% else %> alt="" role="presentation" <% end_if %>width="840" height="$FeaturedImage.ScaleWidth(860).Height" /></p>
            <% end_if %>


        <% end_if %>
          $Content
              <% if $Address || $Location %>
                <h2>Located here:</h2>
                $GoogleMap
              <% end_if %>
              <% if $WebsiteLink %>
              <p><a href="$WebsiteLink" class="button large" target="_blank"><% if $WebsiteLinkButtonText %>$WebsiteLinkButtonText<% else %>Visit Website<% end_if %>  <i class="fa fa-external-link-alt" aria-hidden="true"></i></a></p>
              <% end_if %>
              <% if $Links %>
                <h2>Additional information:</h2>
                <ul>
                <% loop $Links %>
                  <li><a href="$URL" target="_blank"><% if $Title %>$Title<% else %>$URL.LimitCharacters(50)<% end_if %></a></li>
                <% end_loop %>
                </ul>
              <% end_if %>
        $AfterContentConstrained
      </div>
      <% include TagsCategories %>
      $Form

      <% with $Blog %>
      <% include TopicFeedback %>
      <% end_with %>
    </article>


  </div>
  <div class="grid-container">
  <% if $RelatedNewsEntries %>
    <div class="topic-content topic-content--no-pt">
      <% include TopicRelated %>
    </div>
  <% end_if %>

      <% include TopicMore %>
      <% with $Parent %>
        <% include TopicBrowseByFilterFull %>
      <% end_with %>

  </div>
  <% with $Parent %>
    <% include TopicBrowseAllFull %>
    <% include TopicFooterFull %>
  <% end_with %>
  $AfterContent
</main>


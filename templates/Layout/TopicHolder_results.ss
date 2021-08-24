$Header
<main class="main-content__container" id="main-content__container">

  <div class="grid-container">
    <div class="column row">

        <div class="main-content__header">
          $Breadcrumbs
          <h1>Search results</h1>
        </div>

    </div>
  </div>



$BeforeContent




<div class="grid-container">

  <div class="row">
      <article class="column small-12 medium-8">
          <div style="padding-top: 20px;">
            $TopicSearchFormSized("medium")
          </div>
        $BeforeContentConstrained

        <% if $Results || $CategoryResults || $TagResults %>
          <% loop $TagResults %>
            <a href="$Link" class="button button--no-caps hollow black button--skinny"><span class="topicholder-cat-inner">$Title <span style="topicholder-cat-inner__count">({$BlogPosts.Count})</span></span></a>
          <% end_loop %>
          <% loop $CategoryResults %>
            <a href="$Link" class="button button--no-caps hollow black button--skinny"><span class="topicholder-cat-inner">$Title <span style="topicholder-cat-inner__count">({$BlogPosts.Count})</span></span></a>
          <% end_loop %>
          <% loop $Results %>
              <% include TopicCard %>
          <% end_loop %>

        <% else %>
              <% if $Query %>
                <p style="margin-top: 20px; font-weight: bold;">Sorry, there are no results for this search term.</p>
              <% else %>
                <p style="margin-top: 20px; font-weight: bold;">No search term specified. Please specify a search term and try searching again.</p>
              <% end_if %>

        <% end_if %>

        <% include TopicFeedback %>

      </article>



      <div class="column small-12 medium-4">
        <div class="dp-sticky dp-sticky--medium">



          <% include TopicBrowseByFilter %>
        </div>
      </div>
  </div>
</div>



  <% include TopicBrowseAllFull %>
  <% include TopicFooterFull %>

    $AfterContentConstrained
    $Form



$AfterContent

</main>

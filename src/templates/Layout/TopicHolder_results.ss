$Header
<main class="main-content__container" id="main-content__container">

<%--   <% include FeaturedImage %> --%>
<% with $BackgroundImage %>
<div class="background-image" data-interchange="[$FocusFill(600,400).URL, small], [$FocusFill(1600,500).URL, medium]" style="background-position: {$PercentageX}% {$PercentageY}%">
<% end_with %>
    <div style="position: absolute; bottom: 0; z-index: 999; width: 100%;">
      <div class="grid-container">
        <div class="grid-x large-up-2">
          <div class="cell">
            <div>
              <h1 class="background-image__title"><a href="$Link" style="color: white;">$Title</a></h1>
            </div>
        </div>
        <div class="cell">
            $TopicSearchForm
        </div>
      </div>
    </div>
  </div>
</div>

<% if not $BackgroundImage || $IsFilterActive %>
  <div class="column row">
    <div class="main-content__header">
    <% if $IsFilterActive %>
      <% if $CurrentCategory %>
        <h1>Category: $CurrentCategory.Title</h1>
      <% else_if $CurrentTag %>
        <h1>Tag: $CurrentTag.Title</h1>
      <% end_if %>
    <% else %>
      <h1>$Title</h1>
    <% end_if %>
    </div>
  </div>
<% end_if %>

$BeforeContent

<div class="grid-container">
  <div class="grid-x grid-padding-x">
    <article class="cell">
      $BeforeContentConstrained

<%--       <div class="main-content__text">
        $Content
      </div> --%>
          <div class="grid-x grid-padding-x">
            <div class="cell">
                 <h2 style="text-transform: uppercase; color: #333; border-bottom: 2px solid #333;">Search results for "<em>{$Query}</em>":</h2>
            </div>
          </div>
           <% if $Results %>
              <div class="grid-x grid-padding-x small-up-2" style="margin-bottom: 200px;">
                <% loop $Results %>
                  <div class="cell">
                    <h2><a href="$Link">$Title</a></h2>
                      <p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">$Content.LimitCharacters(40).ATT</p>
                      <p style="font-size: 13px;">Last Edited: $LastEdited.Format("MMMM d, YYYY")</p>
                  </div>
                <% end_loop %>
              </div>
            <% else %>
              <p>No topics are currently listed.</p>
            <% end_if %>
    </article>
  </div>
</div>
    <% include TopicFooter %>


    $AfterContentConstrained
    $Form



$AfterContent

</main>
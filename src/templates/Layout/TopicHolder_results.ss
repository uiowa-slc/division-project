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

      <div class="main-content__text">
        $Content
      </div>

 
          $Content
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

<%-- <!-- OLD TEMPLATE BELOW, HERE BE MONSTERS-->



$Header
<main class="main-content__container" id="main-content__container">

  <!-- Background Image Feature -->
  <% if $BackgroundImage %>
    <% include FeaturedImage %>
  <% end_if %>
  $Breadcrumbs

<% if not $BackgroundImage %>
  <div class="column row">
    <div class="main-content__header">
      <h1>$Title</h1>
    </div>
  </div>
<% end_if %>

$BeforeContent

<div class="row">

  <article class="main-content main-content--with-padding <% if $Children || $Menu(2) || $Sidebar ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
    $BeforeContentConstrained
    <div class="main-content__text">
        <% if $Query %>
          <h2>Search results for "<em>{$Query}</em>"</h2>
          <% if $Results %>
              <% loop $Results %>
                  <h3><i class="fa fa-file fa-lg fa-fw"></i><a href="$Link">$Title</a></h3>
                  <p>$Content.LimitCharacters(100)</p>
              <% end_loop %>
          </ul>
          <% else %>
            <p>No results found for "<em>{$Query}</em>."</p>
          <% end_if %>
        <% else %>

        <% end_if %>
        <hr />
        $TopicSearchForm
        <% include TopicHolderAllTopics %>
    </div>
    $AfterContentConstrained
    $Form
    <% if $ShowChildPages %>
      <% include ChildPages %>
    <% end_if %>
  </article>
  <aside class="sidebar">
    <% include SideNav %>
    <% if $SideBarView %>
      $SideBarView
    <% end_if %>
    $Sidebar
  </aside>
</div>
$AfterContent

</main>
 --%>
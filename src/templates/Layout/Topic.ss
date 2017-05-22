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

$BlockArea(BeforeContent)

<div class="row">

  <article role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) || $SidebarBlocks ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
    $BlockArea(BeforeContentConstrained)
    <div class="main-content__text">

        <% if $Address %>
          <div class="row">
            <div class="large-8 columns">
              $Content
              $Form
            </div>
            <div class="large-4 columns">
              $GoogleMapFrame
            </div>
          </div>
          
        <% else %>
          $Content
          $Form
        <% end_if %>
        
        <% if $Links %>
          <h2>Relevant links</h2>
          <ul>
          <% loop $Links %>
            <li><a href="$URL" target="_blank"><% if $Title %>$Title<% else %>$URL.LimitCharacters(50)<% end_if %></a></li>
          <% end_loop %>
          </ul>
        <% end_if %>
        <% if $Tags %>
  
          <p class="tags">
                Tagged as:
              <% loop Tags %>
                  <a href="$Link" title="<% _t('VIEWALLPOSTTAGGED', 'View all posts tagged') %> '$Title'" rel="tag">$Title</a><% if not Last %>,<% end_if %>
              <% end_loop %>
          </p>
        <% end_if %>
    
    </div>
    $BlockArea(AfterContentConstrained)
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
    $BlockArea(Sidebar)
  </aside>
</div>
$BlockArea(AfterContent)

</main>

<div class="topic-subnav">
  <div class="row">
    <div class="large-12 large-centered columns">
        <div class="topic-search__container row">
        <div class="large-9 columns large-centered">
          <h2 class="text-center">Search for a topic below:</h2>
          $SearchForm
        </div>
      </div>
        <hr />
        <% with $Parent %>
          <% include TopicHolderFeaturedTopics %>
        <% end_with %>
        <% include TopicHolderAllTopics %>
    </div>
  </div>
</div>




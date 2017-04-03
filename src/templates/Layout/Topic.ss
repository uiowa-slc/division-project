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
        $Content
        $Form

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
        <% include TopicHolderSearchForm %>
        <hr />
        <% with $Parent %>
          <% include TopicHolderFeaturedTopics %>
        <% end_with %>
        <% include TopicHolderAllTopics %>
    </div>
  </div>
</div>




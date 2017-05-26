$Header
<main class="main-content__container" id="main-content__container">

   <% if $BackgroundImage && not $IsFilterActive %>
    <div class="background-image" data-interchange="[$BackgroundImage.CroppedFocusedImage(600,400).URL, small], [$BackgroundImage.CroppedFocusedImage(1600,500).URL, medium]">
        <div class="column row">
          <div class="background-image__header background-image__header--has-content">
            <h1 class="background-image__title text-center">$Title</h1>
            <div class="topic-search__container row">
              <div class="large-9 columns large-centered">
                <h2 class="text-center">Search for a topic below:</h2>
                $TopicSearchForm
              </div>
            </div>           
          </div>
        </div>
    </div>
  <% end_if %>

  <!-- Background Image Feature -->

  $Breadcrumbs

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

$BlockArea(BeforeContent)

<div class="row">

  <article role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) || $SidebarBlocks ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
    $BlockArea(BeforeContentConstrained)
    <div class="main-content__text">
      $Content
    </div>
      <% if $CurrentCategory %>
        <% with $CurrentCategory %>
          $Content
          <h2>Topics listed under "{$Title}": </h2>
           <% if $BlogPosts %>
            <ul class="featured-topic-list row large-up-2">

            <% loop $BlogPosts %>
              <li class="featured-topic-list__item column column-block">

                <a href="$Link">
                <div class="row collapse">
                  <div class="featured-topic-list__icon-container show-for-large large-1 columns"><i class="fa fa-file-o fa-lg fa-fw"></i></div>
                  <div class="large-11 columns featured-topic-list__heading-container"><h3 class="topic-list__heading">$Title</h3>

                  <p class="bloglistitem__category">
                  <% loop $Categories.Limit(1) %><span href="$URL" class="bloglistitem__category">$Title</span><% end_loop %>
                </p></div>

                </div>

                </a>
              </li>
            <% end_loop %>
            </ul>
            <% else %>
              <p>No topics are currently listed.</p>
          <% end_if %>           
        <% end_with %>
      <% else_if $CurrentTag %>
        <% with $CurrentTag %>
          $Content
          <h2>Topics tagged as "{$Title}": </h2>
           <% if $BlogPosts %>
              <ul class="featured-topic-list row large-up-2">
                <% loop $BlogPosts.Limit(5) %>
                <li class="featured-topic-list__item column column-block">

                  <a href="$Link">
                  <div class="row collapse">
                    <div class="featured-topic-list__icon-container show-for-large large-1 columns"><i class="fa fa-file-o fa-lg fa-fw"></i></div>
                    <div class="large-11 columns featured-topic-list__heading-container"><h3 class="topic-list__heading">$Title</h3>

                    <p class="bloglistitem__category">
                    <% loop $Categories.Limit(1) %><span href="$URL" class="bloglistitem__category">$Title</span><% end_loop %>
                  </p></div>

                  </div>

                  </a>
                </li>
                <% end_loop %>
              </ul>
            <% else %>
              <p>No topics are currently listed.</p>
          <% end_if %>           
        <% end_with %>
      <% end_if %>

      <% if not $BackgroundImage || $IsFilterActive %>
        <div class="topic-search__container row">
          <div class="large-9 columns large-centered">
            <h2 class="text-center">Search for a more topics below:</h2>
            $TopicSearchForm
          </div>
        </div>
       <hr />
      <% end_if %>
    

      <% include TopicHolderAllTopics %>

    $BlockArea(AfterContentConstrained)
    $Form
    <% if $ShowChildPages %>
      <% include ChildPages %>
    <% end_if %>
  </article>
  <aside class="sidebar dp-sticky">
    <% include SideNav %>
    <% if $SideBarView %>
      $SideBarView
    <% end_if %>
    $BlockArea(Sidebar)
  </aside>
</div>
$BlockArea(AfterContent)

</main>

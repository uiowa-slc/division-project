$Header
<main class="main-content__container" id="main-content__container">

  <!-- Background Image Feature -->
  <% if $BackgroundImage %>
    <div class="background-image" data-interchange="[$BackgroundImage.CroppedFocusedImage(600,400).URL, small], [$BackgroundImage.CroppedFocusedImage(1600,500).URL, medium]">
      <%-- <% if $LayoutType == "MainImage" %> --%>
        <div class="column row">
          <div class="background-image__header background-image__header--has-content">
            <h1 class="background-image__title text-center">$Title</h1>
            <div class="topic-search__container row">
              <div class="large-9 columns large-centered">
                <h2 class="text-center">Search for a topic below:</h2>
                $SearchForm
              </div>
            </div>           
          </div>
        </div>
      <%-- <% end_if %> --%>
    </div>
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

  <article role="main" class="main-content main-content--with-padding main-content--full-width">
    $BlockArea(BeforeContentConstrained)
    <div class="main-content__text">
      $Content
    </div>
        <% if $CurrentTag %>
  
            <% with $CurrentTag %>
              <h2>Topics tagged with "<em>$Title</em>":</h2>
                <ul>
                <% loop $BlogPosts %>
                  <li>
                    <h3><i class="fa fa-file-text-o fa-lg fa-fw" aria-hidden="true"></i><a href="$Link">$Title</a></h3>
                    <p>$Content.LimitCharacters(100)</p>
                  </li>
                <% end_loop %>
                </ul>
            <% end_with %>
            

          <hr />

        <% else %>


        <% end_if %>
        <% if not $BackgroundImage %>
        <div class="topic-search__container row">
          <div class="large-9 columns large-centered">
            <h2 class="text-center">Search for a topic below:</h2>
            $SearchForm
          </div>
        </div>
         <hr />
        <% end_if %>
       
        <% include TopicHolderFeaturedTopics %>
        <hr />
        <% include TopicHolderAllTopics %>

    $BlockArea(AfterContentConstrained)
    $Form
    <% if $ShowChildPages %>
      <% include ChildPages %>
    <% end_if %>
  </article>
<%--   <aside class="sidebar">
    <% include SideNav %>
    <% if $SideBarView %>
      $SideBarView
    <% end_if %>
    $BlockArea(Sidebar)
  </aside> --%>
</div>
$BlockArea(AfterContent)

</main>

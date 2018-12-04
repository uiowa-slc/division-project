$Header
<main class="main-content__container" id="main-content__container">
    <!-- Background Image Feature -->
    <% if $BackgroundImage %>
        <% include FeaturedImage %>
    <% end_if %>

    $Breadcrumbs

    <% if not $BackgroundImage %>
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <div class="main-content__header">
                        <h1>$Title</h1>
                    </div>
                </div>
            </div>
        </div>
    <% end_if %>

    $BeforeContent

    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <article role="main" class="main-content main-content--with-padding <% if $SiteConfig.ShowExitButton %>main-content--with-exit-button-padding<% end_if %> <% if $Children || $Menu(2) || $SidebarArea.Elements ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
                $BeforeContentConstrained
                <div class="main-content__text">
                    $Content
                    <% loop $EventList %>
                        <% include EventCard %>
                    <% end_loop %>
                </div>
                $AfterContentConstrained
                $Form
                <% include ChildPages %>
            </article>
            <aside class="sidebar">
                <% include SideNav %>
                <% if $SideBarView %>
                    $SideBarView
                <% end_if %>
                $Sidebar
            </aside>
        </div>
    </div>
    $AfterContent
</main>


$Header

<main class="main-content__container" id="main-content__container">
    <!-- Background Image Feature -->


        <div class="column row">
            <div class="main-content__header">
                $Breadcrumbs
                <h1><% if $FilterType == "author" %>
                        All posts by $FilterTitle:
                    <% else_if $FilterType == "tag" %>
                        All posts tagged with $FilterTitle:
                    <% else_if $FilterType == "category" %>
                        All posts categorized as $FilterTitle:
                    <% else %>
                        $Title
                    <% end_if %></h1>
            </div>
        </div>


    $BeforeContent

    <div class="row">
        <div role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) || $SidebarArea.Elements ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
            $BeforeContentConstrained
            <div class="main-content__text">

                $Content

                <% if $ArchiveYear || $CurrentTag || $CurrentCategory %>
                    <h2>
                        <% if $ArchiveYear %>
                            <%t Blog.Archive 'Archive' %>:
                            <% if $ArchiveDay %>
                                $ArchiveDate.Nice
                            <% else_if $ArchiveMonth %>
                                $ArchiveDate.format('F, Y')
                            <% else %>
                                $ArchiveDate.format('Y')
                            <% end_if %>
                        <% else_if $CurrentTag %>
                            <%t Blog.Tag 'Tag' %>: $CurrentTag.Title
                        <% else_if $CurrentCategory %>
                            <%t Blog.Category 'Category' %>: $CurrentCategory.Title
                        <% else %>
                            $Title
                        <% end_if %>
                    </h2>
                <% end_if %>

                <% if $PaginatedList.Exists %>
                    <% loop $PaginatedList %>
                        <% include StudentLifeNewsCard %>
                    <% end_loop %>
                <% end_if %>

                $Form
                $CommentsForm

                <% with $Pagination %>
                    <% include Pagination %>
                <% end_with %>

                $AfterContentConstrained

                $Form
                $CommentsForm

            </div>
            <% with $PaginatedList %>
                <% include Pagination %>
            <% end_with %>
        </div>


        <aside class="sidebar dp-sticky">
            <% include SideNav %>
            <% if $SideBarView %>
                $SideBarView
            <% end_if %>
            $SidebarArea
        </aside>
    </div>

    $AfterContent

</main>

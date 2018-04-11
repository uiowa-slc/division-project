
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
				<h1 class="page-title">
					<% if $FilterType == "author" %>
						All posts by $FilterTitle:
					<% else_if $FilterType == "tag" %>
						All posts tagged with $FilterTitle:
					<% else_if $FilterType == "category" %>
						All posts categorized as $FilterTitle:
					<% else %>
						$Title
					<% end_if %>
				</h1>
			</div>
		</div>
	<% end_if %>

	$BlockArea(BeforeContent)

	<div class="row">
		<div role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) || $SidebarBlocks ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
			$BlockArea(BeforeContentConstrained)
			<div class="main-content__text">
				$Content
			
				<% if $PaginatedList.Exists %>
					<% loop $PaginatedList %>
						<% include StudentLifeNewsCard %>
					<% end_loop %>
				<% end_if %>
		
				$BlockArea(AfterContentConstrained)
				$Form
				$CommentsForm
		
				<% with $Pagination %>
					<% include Pagination %>
				<% end_with %>


			</div>
		</div>


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
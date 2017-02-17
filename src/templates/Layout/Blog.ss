
$Header

<%-- <% with Page(news) %>
	<div class="bloglist-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
	<% loop $BlogPosts(3) %>
		<% if $IsFeatured %>
			<div class="carousel-cell">
				<div class="expanded row small-collapse">
					<div class="small-6 columns">
						<% if $FeaturedImage %>
						<a href="$Link" class="">
							<img src="$FeaturedImage.CroppedImage(900,600).URL" alt="$Title">
						</a>
					<% else_if $BackgroundImage %>
						<a href="$Link" class="">
							<img src="$BackgroundImage.CroppedImage(900,600).URL" alt="$Title">
						</a>
					<% end_if %>
					</div>
					<div class="small-6 columns">
						<div class="featured-content" style="padding: 2em;">
							<h6>Featured News</h6>
							<% if $ExternalLink %>
								<h3><a href="$ExternalLink">$Title</a></h3>
							<% else %>
								<h3><a href="$Link">$Title</a></h3>
							<% end_if %>
							<p>$Content.LimitCharacters(100)</p>
							<% if $ExternalLink %>
								<p><a href="$ExternalLink" class="continue">Continue Reading</a></p>
							<% else %>
								<p><a href="$Link" class="continue">Continue Reading</a></p>
							<% end_if %>
						</div>
					</div>
				</div>
			</div>
		<% end_if %>
	<% end_loop %><!-- end loop children -->
	</div>
<% end_with %> --%>

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
						<% include BlogCard %>
					<% end_loop %>
				<% end_if %>

				$BlockArea(AfterContentConstrained)
				$Form
				$CommentsForm

				<% with $PaginatedList %>
					<% include Pagination %>
				<% end_with %>

			</div>
		</div>


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

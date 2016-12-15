
$Header
<main class="main-content__container" id="main-content__container">

	$Breadcrumbs

	$BlockArea(BeforeContent)

	<div class="row">
		<div role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">

			<div class="main-content__text">
				<% with CurrentProfile %>
					<div class="clearfix blogprofile">
						<% if $BlogProfileImage %>
							<img src="$BlogProfileImage.CroppedImage(150,150).URL" alt="$FirstName $Surname">
						<% end_if %>
						<h2>$FirstName $Surname</h2>
						<% if $BlogProfileSummary %>
							<div>$BlogProfileSummary</div>
						<% end_if %>
					</div>
					<hr>
					<p><strong>Entries</strong> written by $FirstName $Surname:</p>
					<hr>
				<% end_with %>


				<% if $PaginatedList.Exists %>
					<% loop $PaginatedList %>
						<article class="bloglistitem">
							<% if $FeaturedImage %>
								<a href="$Link" class="">
									<img src="$FeaturedImage.CroppedImage(600,400).URL" alt="$Title" class="bloglistitem__img">
								</a>
							<% end_if %>
							<div class="news_list_item_header">
								<p class="bloglistitem__date">$Date.Long</p>
								<h4 class="bloglistitem__heading"><a href="$Link">$Title</a></h4>

								<% if $Summary %>
									<div class="bloglistitem__desc">$Summary</div>
								<% else %>
									<p class="bloglistitem__desc">$Excerpt</p>
								<% end_if %>
							</div>
						</article>
					<% end_loop %>
				<% end_if %>

				$Form
				$CommentsForm

				<% with $PaginatedList %>
					<% include Pagination %>
				<% end_with %>

			</div>
		</div>


		<aside class="sidebar" data-sticky-container>
			<% include SideNav %>
			<% if $SideBarView %>
				$SideBarView
			<% end_if %>
			$BlockArea(Sidebar)
		</aside>
	</div>

	$BlockArea(AfterContent)

</main>

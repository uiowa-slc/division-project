$Header
<main class="main-content__container" id="main-content__container">

	<div class="column row">
		<div class="main-content__header">
            <% with CurrentProfile %>
                $Breadcrumbs
				<h1>Entries written by $FirstName $Surname:</h1>
			<% end_with %>
		</div>
	</div>

	$BeforeContent

	<div class="row">
		<div role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) || $Sidebar ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
			<div class="main-content__text">
				<% with CurrentProfile %>
					<div class="clearfix blogprofile">
						<% if $BlogProfileImage %>
							<img src="$BlogProfileImage.FocusFill(150,150).URL" alt="$FirstName $Surname" class="left">
						<% end_if %>
						<h3>$FirstName $Surname</h3>
						<% if $BlogProfileSummary %>
							<p>$BlogProfileSummary</p>
						<% end_if %>
					</div>
				<% end_with %>

				<% if $PaginatedList.Exists %>
					<% loop $PaginatedList %>
						<% include BlogCard %>
					<% end_loop %>
				<% end_if %>

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
			$Sidebar
		</aside>
	</div>

	$AfterContent

</main>

$Header
<main class="main-content__container" id="main-content__container">
	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<% include FeaturedImage %>
	<% end_if %>

    <% include MainContentHeader %>

	$BeforeContent

	<div class="row">
		<article class="main-content main-content--with-padding <% if $Children || $Menu(2) || $Sidebar ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">

			$BeforeContentConstrained

			<div class="main-content__text">
				$Content
				<div class="stafflist">
				<% if $Teams %>
					<% loop $Teams %>
						<h2 class="stafflist__title">$Title</h2>
						<table class="stack" summary="List of $Title Staff">
							<thead>
								<tr>
									<th scope="col" width="20%">Name</th>
									<th scope="col" width="37%">Title</th>
									<th scope="col" width="26%">Email</th>
									<th scope="col" width="17%">Phone</th>
								</tr>
							</thead>
							<tbody>
								<% if $Up.SortLastName %>
									<% loop $SortedStaffPages.Sort(LastName, ASC) %>
										<% include StaffPageTableView %>
									<% end_loop %>
									<% else %>
										<% loop $SortedStaffPages %>
										<% include StaffPageTableView %>
									<% end_loop %>
								<% end_if %>
							</tbody>
						</table>
					<% end_loop %>
				<% else %><%-- end if teams --%>
					<table class="stack" summary="List of $Title Staff">
						<thead>
							<tr>
								<th scope="col" width="20%">Name</th>
								<th scope="col" width="37%">Title</th>
								<th scope="col" width="26%">Email</th>
								<th scope="col" width="17%">Phone</th>
							</tr>
						</thead>
						<tbody>
							<% if $Up.SortLastName %>
								<% loop $SortedStaffPages.Sort(LastName, ASC) %>
									<% include StaffPageTableView %>
								<% end_loop %>
								<% else %>
									<% loop $SortedStaffPages %>
									<% include StaffPageTableView %>
								<% end_loop %>
							<% end_if %>
						</tbody>
					</table>
				<% end_if %>
				</div><%-- end stafflist --%>
			</div>
			$AfterContentConstrained
			$Form
		</article>
		<aside class="sidebar">
			<% include SideNav %>

			$Sidebar

		</aside>
	</div>

	$AfterContent

</main>

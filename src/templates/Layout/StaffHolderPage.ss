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
		<article role="main" id="sticky-nav-area" class="main-content main-content--with-padding <% if $Children || $Menu(2) %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">

			$BlockArea(BeforeContentConstrained)

			<div class="main-content__text">
				$Content
				<div class="stafflist">
				<% if $Teams %>
					<% loop $Teams %>
						<h2 class="stafflist__title">$Title</h2>
						<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-3">
						<% if $Up.SortLastName %>
							<% loop $SortedStaffPages.Sort(LastName, ASC) %>
								<% include StaffPageListItem %>
							<% end_loop %>
							</ul>
						<% else %>
							<% loop $SortedStaffPages %>
								<% include StaffPageListItem %>
							<% end_loop %>
							</ul>
						<% end_if %>
					<% end_loop %>
				<% else %><%-- end if teams --%>
					<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-3">
					<% if $Up.SortLastName %>
						<% loop $SortedStaffPages.Sort(LastName, ASC) %>
							<% include StaffPageListItem %>
						<% end_loop %>
						</ul>
					<% else %>
						<% loop $SortedStaffPages %>
							<% include StaffPageListItem %>
						<% end_loop %>
						</ul>
					<% end_if %>
				<% end_if %>
				</div><%-- end stafflist --%>
			</div>
			$BlockArea(AfterContentConstrained)
			$Form
		</article>
		<aside class="sidebar">
			<% include SideNav %>

			$BlockArea(Sidebar)

		</aside>
	</div>

	$BlockArea(AfterContent)

</main>
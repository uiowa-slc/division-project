$Header
<main class="main-content__container" id="main-content__container">
	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<% include FeaturedImage %>
	<% end_if %>

    <% include MainContentHeader %>

	$BeforeContent

	<div class="row">

		<article class="main-content main-content--with-padding <% if not $HideLinksToStaffPages %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">


			$BeforeContentConstrained

			<div class="main-content__text">
				$Content
				<div class="stafflist">
				<% if $Teams %>
					<% loop $Teams %>
                        <% if $SortedStaffPages %>
						<h2 class="stafflist__title">$Title</h2>
                        <% if $Description %>$Description<% end_if %>
						<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-3">
						<% if $Up.SortLastName %>
							<% loop $SortedStaffPages.Sort(LastName, ASC) %>
								<% include StaffPageListItem %>
							<% end_loop %>
						<% else %>
							<% loop $SortedStaffPages %>
								<% include StaffPageListItem %>
							<% end_loop %>
						<% end_if %>
						</ul>
                        <% end_if %>
					<% end_loop %>
				<% else %><%-- end if teams --%>
					<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-3">
						<% loop $Children %>
							<% include StaffPageListItem %>
						<% end_loop %>
					</ul>
				<% end_if %>
				</div><%-- end stafflist --%>
			</div>
			$AfterContentConstrained
			$Form
		</article>
		<aside class="sidebar dp-sticky">

			<% if not $HideLinksToStaffPages %>
				<% include SideNav %>
			<% end_if %>
			$Sidebar

		</aside>
	</div>

	$AfterContent

</main>

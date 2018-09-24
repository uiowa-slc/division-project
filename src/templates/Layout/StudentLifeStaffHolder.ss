
$Header


<main class="main-content__container" id="main-content__container">
	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<% include FeaturedImage %>
	<% end_if %>

	$Breadcrumbs

	$BlockArea(BeforeContent)

	<div class="row">
		<div role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) || $SidebarBlocks ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
			$BlockArea(BeforeContentConstrained)
			<div class="main-content__text">
				$Content
			
				<% loop StaffTeams %>
					<h2 class="stafflist__title">$Title</h2>
						<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-3">
							<% loop $Staff.Sort(LastName, ASC) %>
								<% include StaffPageListItem %>
							<% end_loop %>
						</ul>
				<% end_loop %>
				
				$BlockArea(AfterContentConstrained)
				$Form
				$CommentsForm

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

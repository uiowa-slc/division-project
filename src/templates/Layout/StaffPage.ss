$Header
<main class="main-content__container" id="main-content__container">
	$Breadcrumbs
	<div class="column row">
		<div class="main-content__header">
			<h1>$Title</h1>
		</div>
	</div>

	$BlockArea(BeforeContent)

	<div class="row">

		<article role="main" id="sticky-nav-area" class="main-content main-content--with-padding <% if $Children || $Menu(2) %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">

			$BlockArea(BeforeContentConstrained)

			<div class="main-content__text">
				<div class="staffpage">
					<% if $Photo %>
						<img src="$Photo.ScaleWidth(770).URL" alt="$FirstName $LastName" class="staffpage__img">
					<% end_if %>
					<h2>$Position</h2>
					<ul>
						<% if $EmailAddress %><li><strong>Email:</strong> <a href="mailto:$EmailAddress">$EmailAddress</a></li><% end_if %>
						<% if $Phone %><li><strong>Phone:</strong> $Phone</li><% end_if %>
						<% if $DepartmentName %>
							<li>
								<% if $DepartmentURL %>
									<a href="$DepartmentURL" target="_blank">Department website</a>
								<% else %>
									$DepartmentName
								<% end_if %>
							</li>
						<% end_if %>
					</ul>
				</div>
				$Content
		</article>
		<aside class="sidebar" data-sticky-container>
			<% include SideNav %>
			$BlockArea(Sidebar)
		</aside>
	</div>

	</section>
</main>
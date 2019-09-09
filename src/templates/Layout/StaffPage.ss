$Header
<main class="main-content__container" id="main-content__container">
	$Breadcrumbs
	<div class="column row">
		<div class="main-content__header">
			<h1>$Title</h1>
		</div>
	</div>

	$BeforeContent

	<div class="row">

		<article class="main-content main-content--with-padding <% if $Children || $Menu(2) || $Sidebar ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">

			$BeforeContentConstrained

			<div class="main-content__text">
				<div class="staffpage">
					<% if $Photo %>
						<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="$Photo.ScaleWidth(945).URL" width="945" height="$Photo.ScaleWidth(945).Height" alt="$Title" role="presentation" class="staffpage__img">
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
						<% if $OtherWebsiteLink %>
							<li><a href="$OtherWebsiteLink" target="_blank">
								<% if $OtherWebsiteLabel %>
									$OtherWebsiteLabel
								<% else %>
									Website
								<% end_if %>
							</a></li>
						<% end_if %>
					</ul>
				</div>
				$Content
		</article>
		<aside class="sidebar" class="dp-sticky">
			<% include SideNav %>
			$Sidebar
		</aside>
	</div>
</main>

$Header
<main class="main-content__container" id="main-content__container">
	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<div class="background-image" data-interchange="[$BackgroundImage.CroppedFocusedImage(600,400).URL, small], [$BackgroundImage.CroppedFocusedImage(1600,500).URL, medium]">
			<% if $LayoutType == "MainImage" %>
				<div class="column row">
					<div class="background-image__header">
						<h1 class="background-image__title">$Title</h1>
					</div>
				</div>
			<% end_if %>
		</div>
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

		<article role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
			$BlockArea(BeforeContentConstrained)
			<div class="main-content__text">
				$Content
				<% if $CurrentTag %>
					<div class="who-does-what-selected-tag">
						<p><% _t('VIEWINGTAGGED', 'Departments tagged with') %> '<strong>$CurrentTag.Title</strong>':</p>
					</div>
				<% end_if %>

				<%-- If Table View is checked else show List view --%>
				<% if $TableViewCheck %>
					<table class="stack hover" summary="List of $Title Staff">
						<thead>
							<tr>
								<th scope="col" width="33%">Office Name:</th>
								<th scope="col">Location</th>
								<th scope="col">Phone</th>
								<th scope="col">Email</th>
								<th scope="col">Website</th>
							</tr>
						</thead>
						<tbody>
							<% loop $PaginatedList.Sort(Title) %>
								<tr>
									<td><% if $OfficeName %>$OfficeName<% else %>$MenuTitle<% end_if %></td>
									<td><% if $OfficeLocation %>$OfficeLocation<% end_if %></td>
									<td><% if $PhoneNumber %>$PhoneNumber<% end_if %></td>
									<td><% if $EmailAddress %><a href="mailto:$EmailAddress">$EmailAddress</a><% end_if %></td>
									<td><% if $Website %><a href="$Website" target="_blank">Website</a><% end_if %></td>
								</tr>
							<% end_loop %>
						</tbody>
					</table>
				<% else %>
					<hr>
					<% loop $PaginatedList.Sort(Title) %>
						<div class="media-object stack-for-small">
							<% if $FeaturedImage %>
								<div class="media-object-section">
									<div class="thumbnail">
										$FeaturedImage.CroppedImage(200,200)
									</div>
								</div>
							<% end_if %>
							<div class="media-object-section">
								<h4>$MenuTitle</h4>
								<ul class="no-bullet">
									<% if $OfficeName %><li><strong>Office Name:</strong> $OfficeName</li><% end_if %>
									<% if $OfficeLocation %><li><strong>Location:</strong> $OfficeLocation</li><% end_if %>
									<% if $PhoneNumber %><li><strong>Phone Number:</strong> $PhoneNumber</li><% end_if %>
									<% if $EmailAddress %><li><strong>Email:</strong> <a href="mailto:$EmailAddress">$EmailAddress</a></li><% end_if %>
								</ul>
								<% if $Website %><p><a class="button" href="$Website" target="_blank">Visit Website</a></p><% end_if %>
								$AdditionalInfo
								<% if Tags %>
									<div class="who-does-what-section-tags">
									<p>
										Tags:
										<% loop Tags %>
											<a href="$Link" title="View all posts tagged '$Title'" rel="tag">$Title</a><% if not Last %>,<% end_if %>
										<% end_loop %>
									</p>
									</div>
								<% end_if %>
							</div>
						</div>
						<hr>
					<% end_loop %>
				<% end_if %>
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
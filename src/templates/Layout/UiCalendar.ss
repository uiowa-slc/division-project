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


	<!-- Featured Events (3) -->
	<%-- <% with LocalistCalendar %>
		<% if $FeaturedEvents %>

			<div class="row">
			<div class="locallist-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
				<% loop $FeaturedEvents.Limit(3) %>
					<div class="carousel-cell">
						<div class="small-6 columns">
							<% if $Image %>
								<a href="$Link" class="featured-photo">
									<img src="$Image.URL" alt="$Title" >
								</a>
							<% end_if %>
						</div>
						<div class="small-6 columns">
							<div class="">
								<h4><a href="$Link">$Title</a></h4>
								<!-- Venue -->
								<% if $Venue %>
									<p>$Venue.Title</p>
								<% end_if %>
								<!-- Dates -->
								<% if $Dates %>
									<% if $Dates.Count > "1" %>
											<p>multiple dates available</p>
										<% else %>
											<% loop $Dates %>
												<p class="date-time">
													<% with $StartDateTime %>
														<time itemprop="startDate" datetime="$Format(c)">
															$Format(l), $Format(F) $Format(j)
														</time>
														 <br />$Format("g:i A")
													<% end_with %>
													<% if $EndTime %>
														<% with $EndTime %>
															- $Format("g:i A")
														<% end_with %>
													<% end_if %>
													<% if $EndDate %>
														until
														<% with $EndDate %>
															<time itemprop="endDate" datetime="$Format(c)">
																$Format(l), $Format(F) $Format(j)
															</time>
															<br />$Format("g:i A")
														<% end_with %>
													<% end_if %>
												</p>
											<% end_loop %>
										<% end_if %>
								<% end_if %>
							</div>
						</div>
					</div>
				<% end_loop %>
			</div>
			</div>
		<% end_if %>
	<% end_with %> --%>

	$BeforeContent

	<div class="row">

		<article role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) || $Sidebar ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
			$BeforeContentConstrained
			<div class="main-content__text">
				$Content
				<% loop $EventList %>
					<% include EventCard %>
				<% end_loop %>
			</div>
			$AfterContentConstrained
			$Form
			<% include ChildPages %>
		</article>
		<aside class="sidebar">
			<% include SideNav %>
			<% if $SideBarView %>
				$SideBarView
			<% end_if %>
			$SidebarArea
		</aside>
	</div>
	$AfterContent

</main>
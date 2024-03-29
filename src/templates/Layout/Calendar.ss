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

	$BeforeContent

	<div class="row">

		<article class="main-content main-content--with-padding <% if $SiteConfig.ShowExitButton %>main-content--with-exit-button-padding<% end_if %> <% if $Children || $Menu(2) || $Sidebar ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
			$BeforeContentConstrained
			<% if $MainImage %>
				<img class="main-content__main-img" src="$MainImage.FocusCropWidth(600).URL" alt="" role="presentation"/>
			<% end_if %>
			<div class="main-content__text">
				
				$Content
			
			</div>
			$AfterContentConstrained
			$Form
			<% if $Events %>
				<section class="childpages" aria-labelledby="ChildPages">
				<h2 class="show-for-sr" id="ChildPages">Related Navigation</h2>
				<% loop $Events %>
					<% with Event %>
					<div class="childpages__page <% if $BackgroundImage || $MainImage || $YoutubeBackgroundEmbed %>childpages--withphoto<% end_if %>">
						<a href="$Link" class="childpages__blocklink">
							<% if $BackgroundImage %>
								<img data-original="$BackgroundImage.FocusFill(180,150).URL" width="180" height="150" class="childpages__img dp-lazy" alt="$Title">
							<% else_if $YoutubeBackgroundEmbed %>
								<img src="http://img.youtube.com/vi/$YoutubeBackgroundEmbed/sddefault.jpg" class="childpages__img" alt="$Title">
							<% else_if $MainImage %>
								<img data-original="$MainImage.FocusFill(180,150).URL" width="180" height="150" class="childpages__img dp-lazy" alt="$Title">			
							<% end_if %>
						<% end_with %>
							<div class="clearfix childpages__content">
								<h3 class="childpages__title">$Event.Title</h3>

									<p class="childpages__summary">
										$DateRange<% if AllDay %> <% _t('Calendar.ALLDAY','All Day') %><% else %><% if StartTime %> $TimeRange<% end_if %><% end_if %></p>
									<% if $Event.Location %><strong>Location:</strong> $Event.Location <% end_if %>
									$Event.Content.FirstSentence.LimitCharacters(200)</p>
							
								<span class="childpages__link">Learn More</span>
							</div>
						</a>
					</div>
				<% end_loop %>
				</section>
			<% end_if %>
		</article>
		<aside class="sidebar dp-sticky">
			<% include SideNav %>
			<% if $SideBarView %>
				$SideBarView
			<% end_if %>
			$Sidebar
		</aside>
	</div>
	$AfterContent

</main>

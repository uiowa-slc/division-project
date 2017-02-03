<% if $UseBackground %>
	<section class="content-block__container content-block__container--padding featuredpageblock-bg" style="background-image: url(<% if $FeaturePagePhoto %>$FeaturePagePhoto.CroppedFocusedImage(900,400).URL<% else_if $PageTree.BackgroundImage %>$PageTree.BackgroundImage.CroppedFocusedImage(900,400).URL<% end_if %>)">
		<div class="content-block">
			<div class="$CSSClasses">
				<div class="featuredpageblock__body">
					<h3 class="featuredpageblock__title"><% if $Title %>$Title<% else %>$PageTree.Title<% end_if %></h3>
					<div class="featuredpageblock__desc">
						<% if $FeaturePageSummary %>
							$FeaturePageSummary
						<% else %>
							$PageTree.Content.LimitCharacters(160)
						<% end_if %>
					</div>
					<div class="featuredpageblock__button">
						<a href="$PageTree.Link" class="border-effect">Learn More</a>
					</div>
				</div>
			</div>
		</div>
	</section>

<% else %>

	<section class="content-block__container content-block__container--padding">
		<div class="content-block">
			<div class="$CSSClasses">
				<% if $FeaturePagePhoto %>
					<div class="featuredpageblock__media">
						<a href="$PageTree.Link" class="border-effect">
							<img src="$FeaturePagePhoto.CroppedFocusedImage(600,425).URL" alt="">
						</a>
					</div>
				<% else_if $PageTree.BackgroundImage %>
					<div class="featuredpageblock__media">
						<a href="$PageTree.Link" class="border-effect">
							<img src="$PageTree.BackgroundImage.CroppedFocusedImage(600,425).URL" alt="">
						</a>
					</div>
				<% end_if %>
				<div class="featuredpageblock__body<% if $FeaturePagePhoto || $PageTree.BackgroundImage %>--wimage<% end_if %>">
					<h3 class="featuredpageblock__title">
						<a href="$PageTree.Link">
							<% if $Title %>$Title<% else %>$PageTree.Title<% end_if %>
						</a>
					</h3>
					<div class="featuredpageblock__desc">
						<% if $FeaturePageSummary %>
							$FeaturePageSummary
						<% else %>
							$PageTree.Content.LimitCharacters(160)
						<% end_if %>
					</div>
					<div class="featuredpageblock__button">
						<a href="$PageTree.Link" class="border-effect">Learn More</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<% end_if %>
<%-- <div class="featured-page row <% if $UseBackground %>featured-background<% end_if %>" > --%>
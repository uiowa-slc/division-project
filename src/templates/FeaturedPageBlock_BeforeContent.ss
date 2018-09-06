<% if $UseBackground %>
	<section aria-labelledby="Block$ID" class="content-block__container content-block__container--padding featuredpageblock-bg dp-lazy" data-original="<% if $FeaturePagePhoto %>$FeaturePagePhoto.FocusFill(1400,500).URL<% else_if $PageTree.BackgroundImage %>$PageTree.BackgroundImage.FocusFill(1400,500).URL<% else_if $PageTree.YoutubeBackgroundEmbed %>http://img.youtube.com/vi/$PageTree.YoutubeBackgroundEmbed/maxresdefault.jpg<% else_if $PageTree.FeaturedImage %>$PageTree.FeaturedImage.FocusFill(1400,500).URL<% end_if %>">
		<div class="content-block">
			<div class="$CSSClasses">
				<div class="featuredpageblock__body">
					<h3 id="Block$ID" class="featuredpageblock__title"><% if $Title && $ShowTitle %>$Title<% else %>$PageTree.Title<% end_if %></h3>
					<div class="featuredpageblock__desc">
						<% if $FeaturePageSummary %>
							$FeaturePageSummary
						<% else_if $PageTree.MetaDescription %>
							$PageTree.MetaDescription.LimitCharacters(200)
						<% else %>
							$PageTree.Content.FirstSentence.LimitCharacters(200)
						<% end_if %>
					</div>
					<div class="featuredpageblock__button">
						<% if $Source == "External" %>
							<a href="$FeaturePageExternalUrl" class="border-effect">Learn More</a>
						<% else %>
							<a href="$PageTree.Link" class="border-effect">Learn More</a>
						<% end_if %>
					</div>
				</div>
			</div>
		</div>
	</section>

<% else %>

	<section aria-labelledby="Block$ID" class="content-block__container content-block__container--padding">
		<div class="content-block">
			<div class="$CSSClasses">
				<% if $FeaturePagePhoto %>
					<div class="featuredpageblock__media">
						<% if $Source == "External" %>
							<a href="$FeaturePageExternalUrl" class="border-effect">
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="$FeaturePagePhoto.FocusFill(600,425).URL" width="600" height="425" alt="$PageTree.Title">
							</a>
						<% else %>
							<a href="$PageTree.Link" class="border-effect">
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="$FeaturePagePhoto.FocusFill(600,425).URL" width="600" height="425" alt="$PageTree.Title">
							</a>
						<% end_if %>
					</div>
				<% else_if $PageTree.BackgroundImage %>
					<div class="featuredpageblock__media">
						<% if $Source == "External" %>
							<a href="$FeaturePageExternalUrl" class="border-effect">
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="$PageTree.BackgroundImage.FocusFill(600,425).URL" width="600" height="425" alt="$PageTree.Title">
							</a>
						<% else %>
							<a href="$PageTree.Link" class="border-effect">
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="$PageTree.BackgroundImage.FocusFill(600,425).URL" width="600" height="425" alt="$PageTree.Title">
							</a>
						<% end_if %>
					</div>
				<% else_if $PageTree.FeaturedImage %>
					<div class="featuredpageblock__media">
						<% if $Source == "External" %>
							<a href="$FeaturePageExternalUrl" class="border-effect">
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="$PageTree.FeaturedImage.FocusFill(600,425).URL" alt="$PageTree.Title">
							</a>
						<% else %>
							<a href="$PageTree.Link" class="border-effect">
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="$PageTree.FeaturedImage.FocusFill(600,425).URL" alt="$PageTree.Title">
							</a>
						<% end_if %>
					</div>
				<% else_if $PageTree.YoutubeBackgroundEmbed %>
					<div class="featuredpageblock__media">
						<% if $Source == "External" %>
							<a href="$FeaturePageExternalUrl" class="border-effect">
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="http://img.youtube.com/vi/$PageTree.YoutubeBackgroundEmbed/sddefault.jpg" alt="$PageTree.Title">
							</a>
						<% else %>
							<a href="$PageTree.Link" class="border-effect">
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy" data-original="http://img.youtube.com/vi/$PageTree.YoutubeBackgroundEmbed/sddefault.jpg" alt="$PageTree.Title">
							</a>
						<% end_if %>
					</div>
				<% end_if %>
				<div class="featuredpageblock__body<% if $FeaturePagePhoto || $PageTree.BackgroundImage || $PageTree.YoutubeBackgroundEmbed || $PageTree.FeaturedImage %>--wimage<% end_if %>">
					<h3 id="Block$ID" class="featuredpageblock__title">
						<% if $Source == "External" %>
							<a href="$FeaturePageExternalUrl">
								<% if $Title && $ShowTitle %>$Title<% else %>$PageTree.Title<% end_if %>
							</a>
						<% else %>
							<a href="$PageTree.Link">
								<% if $Title && $ShowTitle %>$Title<% else %>$PageTree.Title<% end_if %>
							</a>
						<% end_if %>
					</h3>
					<div class="featuredpageblock__desc">
						<% if $FeaturePageSummary %>
							$FeaturePageSummary
						<% else_if $PageTree.MetaDescription %>
							$PageTree.MetaDescription.LimitCharacters(200)
						<% else %>
							$PageTree.Content.FirstSentence.LimitCharacters(200)
						<% end_if %>
					</div>
					<div class="featuredpageblock__button">
						<% if $Source == "External" %>
							<a href="$FeaturePageExternalUrl" class="border-effect">Learn More</a>
						<% else %>
							<a href="$PageTree.Link" class="border-effect">Learn More</a>
						<% end_if %>
					</div>
				</div>
			</div>
		</div>
	</section>
<% end_if %>
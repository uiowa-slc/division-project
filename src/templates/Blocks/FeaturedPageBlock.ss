<section class="content-block__container content-block__container--padding">
	<div class="content-block">
		<div class="featured-page row">
			<% if $FeaturePagePhoto %>
				<div class="featured-page__media medium-6 columns">
					<a href="$PageTree.Link">
						<img src="$FeaturePagePhoto.CroppedFocusedImage(600,400).URL" alt="">
					</a>
				</div>
			<% else_if $PageTree.BackgroundImage %>
				<div class="featured-page__media medium-6 columns">
					<a href="$PageTree.Link">
						<img src="$PageTree.BackgroundImage.CroppedFocusedImage(600,400).URL" alt="">
					</a>
				</div>
			<% end_if %>
			<div class="medium-6 columns">
				<div class="featured-page__body">
					<h3 class="featured-page__title">$PageTree.Title</h3>
					<hr class="featured-page__rule">
					<div class="featured-page__desc">
						<% if $FeaturePageSummary %>
							$FeaturePageSummary.LimitCharacters(140)
						<% else %>
							$PageTree.Content.LimitCharacters(140)
						<% end_if %>
					</div>
					<div class="featured-page__button">
						<a href="$PageTree.Link">Learn More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
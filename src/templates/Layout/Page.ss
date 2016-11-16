$Header
<div class="main-content__container" id="main-content__container">

	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<div class="background-image" data-interchange="[$BackgroundImage.CroppedImage(600,400).URL, small], [$BackgroundImage.CroppedImage(1600,500).URL, medium]">
			<% if $LayoutType == "MainImage" %>
				<div class="column row">
					<div class="background-image__header">
						<h1 class="background-image__title">$Title</h1>
					</div>
				</div>
			<% end_if %>
		</div>
	<% end_if %>

	<% include MainContentBody %>

</div>
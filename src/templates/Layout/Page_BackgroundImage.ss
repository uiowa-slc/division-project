<div class="bg-media bg-media--image" data-interchange="[$BackgroundImage.FocusFill(600,400).URL, small], [$BackgroundImage.FocusFill(1600,700).URL, medium]">
	<div class="header__screen header__screen--fill-container header__screen--thin"></div>
	$Header("dark-header","overlay")
	<div class="column row">
		<div class="background-image__header">
			<h1 class="background-image__title">$Title</h1>
		</div>
	</div>
</div>

<div class="main-content__container main-content--has-video-bg">
	$Breadcrumbs
	<% include MainContentBody %>
</div>
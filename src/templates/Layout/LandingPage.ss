<div class="bg-media bg-media--image" style="background-image: url('$BackgroundImage.URL');">
	<div class="header__screen header__screen--fill-container header__screen--thin"></div>
	$Header("dark-header","overlay")
	<div class="background-image__header">
		<h1 class="background-image__title text-center">$Title</h1>
		<p>
			<!-- must add `id="page-content"` to container directly following hero -->
			<a class="hero-scroll-prompt" data-scroll href="#page-content">
				<span class="a11y-sr-only">Skip to main content</span>
			</a>
		</p>
	</div>
</div>

<div class="main-content__container main-content--has-video-bg">

	$BlockArea(BeforeContent)

	<div class="row">

		<article role="main" id="page-content" class="main-content main-content--with-padding main-content--full-width">
			$BlockArea(BeforeContentConstrained)
			<div class="main-content__text">
				$Content
			</div>
			$BlockArea(AfterContentConstrained)
			$Form
			<% include ChildPages %>
		</article>
	</div>
	$BlockArea(AfterContent)
</div>
$Header
<main class="main-content__container" id="main-content__container">

	<div class="background-image">
		<div class="video-background">
			<div class="video-foreground">
				<iframe src="https://www.youtube.com/embed/28ji6G5hTRw?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=28ji6G5hTRw" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		<div class="column row">
			<div class="background-image__header">
				<h1 class="background-image__title">$Title</h1>
				<% if ClassName == 'BlogPost' %><% include ByLine %><% end_if %>
			</div>
		</div>
	</div>
	$Breadcrumbs
	<% include MainContentBody %>

</main>






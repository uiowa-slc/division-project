<main class="main" role="main">
	<header class="page-header">
		<div class="container">
			<h1 class="page-title">$Title</h1>


		</div>
	</header>
	<section class="container page-content">
		<div class="row">
			<!-- Main Content -->
			<h3 id="main-content" class="sr-only" tabindex="-1">Main Content</h3>
			<div class="col-lg-8">

				$Content
				$Form

				<% loop $EventList %>
					<% include EventCard %>
				<% end_loop %>

			</div>

			<!-- Side Bar -->



		</div><!-- end .row -->
	</section>
</main><!-- end .container -->

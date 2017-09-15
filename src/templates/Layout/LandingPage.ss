
<div class="header__container header__container--{$DarkLight} header__container--{$HeaderType}">
	<% include DivisionBar %>
</div>

<% if $HeaderImage %>
<div class="lp-header" data-interchange="[$HeaderImage.CroppedFocusedImage(600,400).URL, small], [$HeaderImage.CroppedFocusedImage(1600,800).URL, medium]">
	<div class="lp-header__container">
		<% if $HeaderLogo %>
			<img src="$HeaderLogo.URL" alt="" class="lp-header__img">
		<% end_if %>
		<% if $HeaderText %>
			<h2 class="lp-header__title">$HeaderText</h2>
		<% end_if %>
	</div>
</div>
<% end_if %>

<!-- Section Menu -->
<% if $Sections %>
<div class="lp-menu dp-sticky">
	<nav class="lp-menu__nav">
		<ul class="lp-menu__list" data-magellan>
			<li class="lp-menu__listitem">
				<a href="#top" class="lp-menu__item lp-menu__item--title">$Title</a>
			</li>
			<% loop $Sections %>
				<li class="lp-menu__listitem">
					<a href="#$Title" class="lp-menu__item">$Title</a>
				</li>
			<% end_loop %>
		</ul>
	</nav>
</div>
<% end_if %>



<main id="top" class="main-content__container">

	$BlockArea(BeforeContent)

	<div class="row">
		<article role="main" id="page-content" class="main-content main-content--with-padding main-content--full-width">
			$BlockArea(BeforeContentConstrained)
			<div class="main-content__text">
				<h1>$Title</h1>
				$Content
			</div>
			<% if $Sections %>
				<% loop $Sections %>
					<div class="lp-section" id="$Title" data-magellan-target="$Title">
						<hr>
						<h2 >$Title</h2>
						$Content
					</div>
				<% end_loop %>
			<% end_if %>
			$BlockArea(AfterContentConstrained)
			$Form
		</article>
	</div>
	<br>
	$BlockArea(AfterContent)
</main>
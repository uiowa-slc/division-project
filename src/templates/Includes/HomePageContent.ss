$BlockArea(BeforeContent)
<section class="content-block">
	<div class="row">
		<article class="tagline" role="main">
			<h3 class="tagline__heading">Our Mission And Vision</h3>

			<p class="tagline__text">$SiteConfig.Tagline</p>
			<div class="tagline__separator"></div>
		</article>
	</div>
</section>
<%-- <section class="content-block">
	<div class="row">
		<div class="welcome__inner">
			<p class="welcome__text">Welcome to the Office of the Vice President website, a branch of the Division of Student Life. We work with students to create and promote a multitude of educational opportunities that complement the opportunities that students have within the curriculum they study.</p>
		</div>
		<div class="profile profile--column">
			<div class="profile__media">
				<img src="{$ThemeDir}/dist/images/profile--tom.jpg" role="presentation" alt="" class="profile__image" />
			</div>
			<div class="profile__text">
				<blockquote class="quote quote--no-border">
					<p>&ldquo;I have the privilege of leading a talented and dedicated staff committed to our mission of fostering student success.&rdquo;</p>
					<div class="quote__attribution">
						- <a href="#">Tom Rocklin</a>, Vice President For Student Life
					</div>
				</blockquote>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="welcome__menu-inner">
			<ul class="welcome__menu">
				<li class="welcome__menu-item"><span class="subheader">Learn more about:</span></li>
				<li class="welcome__menu-item"><a class="welcome__menu-link caret-link" href="#">Diversity</a></li>
				<li class="welcome__menu-item"><a class="welcome__menu-link caret-link" href="#">Health &amp; Wellbeing</a></li>
				<li class="welcome__menu-item"><a class="welcome__menu-link caret-link" href="#">Leadership</a></li>
				<li class="welcome__menu-item"><a class="welcome__menu-link caret-link" href="#">Assessment Efforts</a></li>
			</ul>
		</div>
	</div>
</section> --%>


<%-- <section class="content-block">
	<h2 class="content-block-header header--centered header--small">Initiatives and Engagement</h2>
	<div class="tile-grid row small-up-1 medium-up-2 large-up-3 xlarge-up-4">
		<% loop ChildrenOf("initiatives") %>
			<a href="$Link" class="tile column" style="background-image: url('$BackgroundImage.URL')">
				<div class="tile__text"><h2 class="tile__header">$Title</h2></div>
			</a>
		<% end_loop %>
	</div>
</section> --%>

<%-- <section class="content-block content-block--padding">
	<div class="row">
		<div class="featured-page">
			<div class="featured-page__text large-6 columns">
				<h2 class="heading--small">Multiculturalism and Diversity</h2>
				<p>Given the evidence that binge drinking is an issue at the University, the Division of Student Life has spear-headed collaborative efforts on alcohol harm reduction. This plan involves education, bystander interference, communication, and policy review.</p>
				<ul class="unstyled-list">
					<li><a class="caret-link" href="#">Timeline and Support Structure</a></li>
					<li></li>
				</ul>
			</div>
			<a href="#" class="tile tile--single large-6 columns" style="background-image: url('{$ThemeDir}/dist/images/tile-example.jpg')">
				<div class="tile__text"><p>$Title</p></div>
			</a>
		</div>
	</div>
</section> --%>
$BlockArea(AfterContent)
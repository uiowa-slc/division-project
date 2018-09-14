<div class="bg-media bg-media--image" data-interchange="[$FeaturedImage.FocusFill(600,400).URL, small], [$FeaturedImage.FocusFill(1600,700).URL, medium]">
	<div class="header__screen header__screen--fill-container header__screen--thin"></div>
	$Header("dark-header","overlay")
	<div class="column row">
			<div class="background-image__header">
				<h1 class="background-image__title">$Title</h1>
				<% if ClassName == 'BlogPost' %><% include ByLine %><% end_if %>
			</div>
		</div>
</div>

<main class="main-content__container" id="main-content__container">

	$Breadcrumbs

	$BlockArea(BeforeContent)

	<div class="row">

		<article role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) || $BlockArea(Sidebar) ||  $BlockArea(Sidebar)View.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
			$BlockArea(BeforeContentConstrained)
			<div class="main-content__text">
				$Content
				<% include TagsCategories %>
			</div>
			$BlockArea(AfterContentConstrained)
			$Form
		</article>
		<aside class="sidebar">
			<% include RelatedNewsEntries %>
			<%-- <% include SideNav %> --%>
			<% if $BlockArea(Sidebar)View %>
				$BlockArea(Sidebar)View
			<% end_if %>
			$BlockArea(Sidebar)
		</aside>
	</div>
	$BlockArea(AfterContent)

</main>
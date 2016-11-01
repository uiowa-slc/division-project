
<div class="bg-media bg-media--image" style="background-image: url('$BackgroundImage.URL');">
	<div class="header__screen header__screen--fill-container header__screen--thin"></div>
	$Header(dark,overlay)
</div>

<div class="main-content__container main-content--has-video-bg">
	$BlockArea(BeforeContent)
	<div class="row">	
		<article role="main" id="sticky-nav-area" class="main-content main-content--with-padding <% if $Children || $Menu(2) %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
		    $BlockArea(BeforeContentConstrained)
		    $Content
		    $BlockArea(AfterContentConstrained)
			$Form
		</article>

		<aside class="sidebar" data-sticky-container>
			<% include SideNav %>
		</aside>
	</div>
	$BlockArea(AfterContent)
</div>

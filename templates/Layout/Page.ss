<% include Header %>
<div class="main-content__container">
	<% if $BackgroundImage %>
		<div class="row-fluid">
			<img src="$BackgroundImage.URL" alt="" role="presentation" class="background-media large-12"/>
		</div>
	<% end_if %>

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
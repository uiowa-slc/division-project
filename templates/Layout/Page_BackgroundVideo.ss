<div class="page-bg-video__container">
	<div class="page-bg-video" data-vide-bg="{$ThemeDir}/videos/dm_video.mp4" data-vide-options="loop: false, muted: false, position: 0% 0%, bgColor: '#222'">
	$Header(dark,overlay)
	</div>
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

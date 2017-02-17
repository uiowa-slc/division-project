$Header
<main class="main-content__container" id="main-content__container">

	<% if $BackgroundImage %>
		<% include FeaturedImage %>
	<% end_if %>

	<% if $YoutubeBackgroundEmbed %>
		<div class="backgroundvideo">
			<div id="ESEE" class="backgroundvideo__container" data-interchange="[http://img.youtube.com/vi/$YoutubeBackgroundEmbed/sddefault.jpg, small], [http://img.youtube.com/vi/$YoutubeBackgroundEmbed/maxresdefault.jpg, large]">
				<a href="http://www.youtube.com/embed/$YoutubeBackgroundEmbed" data-video="$YoutubeBackgroundEmbed" class="backgroundvideo__link">
				</a>
			</div>
		</div>
	<% end_if %>

	$Breadcrumbs

	<% if not $BackgroundImage %>
		<div class="column row">
			<div class="main-content__header">
				<h1>$Title</h1>
				<% if $Summary %>
					<div class="blogpost__summary">$Summary</div>
				<% end_if %>
			</div>
			<% if $FeaturedImage %>
				<% if FeaturedImage.Width >= 1200 %>
					<p class="post-image">$FeaturedImage.CroppedFocusedImage(1200,700)</p>
				<% end_if %>
			<% end_if %>
		</div>
	<% end_if %>

	$BlockArea(BeforeContent)

	<div class="row">
		<article role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) || $SidebarBlocks ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
			$BlockArea(BeforeContentConstrained)
			<div class="main-content__text">
				<% if $FeaturedImage %>
					<% if FeaturedImage.Width >= 700 && FeaturedImage.Width < 1200 %>
						<p class="post-image">$FeaturedImage.SetWidth(840)</p>
					<% end_if %>
				<% end_if %>
				<div class="content">

					<div class="blogmeta clearfix">
						<% include ByLine %>
						<ul class="blogmeta__social">
							<li><a href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=$AbsoluteLink', '_blank', 'width=400,height=500');void(0);"  title="Share on Facebook"><img src="{$ThemeDir}/dist/images/icon_facebook.png" alt="Share on Facebook"></a>
							</li>
							<li><a href="https://twitter.com/intent/tweet?text=$AbsoluteLink" title="Share on Twitter" target="_blank"><img src="{$ThemeDir}/dist/images/icon_twitter.png" alt="Share on Twitter"></li>
							<li><a href="javascript:window.open('https://www.linkedin.com/cws/share?url=$AbsoluteLink', '_blank', 'width=400,height=500');void(0);" title="Share on LinkedIn" target="_blank"><img src="{$ThemeDir}/dist/images/icon_linkedin.png"></a></li>
						</ul>
					</div>
					<% if $FeaturedImage %>
						<% if FeaturedImage.Width < 700 %>
							<img src="$FeaturedImage.URL" alt="" class="right post-image">
						<% end_if %>
					<% end_if %>
					$Content
				</div>
				$BlockArea(AfterContentConstrained)
				<% include TagsCategories %>
			</div>
			$Form
		</article>
		<aside class="sidebar">
			<% include SideNav %>
			<% if $SideBarView %>
				$SideBarView
			<% end_if %>
			$BlockArea(Sidebar)
		</aside>
	</div>
	$BlockArea(AfterContent)
</main>

<% if $RelatedNewsEntries %>
	<div class="relatednews">
		<div class="column row">
			<h3 class="relatednews-title">Related News</h3>
		</div>
		<ul class="row medium-up-3 ">
			<% loop $RelatedNewsEntries.limit(3) %>
				<li class="column column-block">
					<% include BlogCard %>
				</li>
			<% end_loop %>
		</ul>
	</div>
<% end_if %>













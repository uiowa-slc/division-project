$Header
<main class="main-content__container" id="main-content__container">

	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<% if $FullImageAltText %>
			<img class="full-image__img" src="$BackgroundImage.URL" alt="$FullImageAltText.ATT"  />
		<% else %>
			<img class="full-image__img" src="$BackgroundImage.URL" alt="" role="presentation" />
		<% end_if %>
	<% end_if %>

    $BeforeContent
    
    <div class="column row">
        <div class="main-content__header">
            $Breadcrumbs
            <h1>$Title</h1>
        </div>
    </div>
	<div class="row">
		<article class="main-content main-content--with-padding <% if $SiteConfig.ShowExitButton %>main-content--with-exit-button-padding<% end_if %> <% if $Children || $Menu(2) || $SidebarBlocks ||  $SidebarView.Widgets %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
			$BeforeContentConstrained
			<div class="main-content__text">
				$Content
			</div>
			$AfterContentConstrained
			$Form
			<% if $ShowChildPages %>
				<% include ChildPages %>
			<% end_if %>
		</article>
		<aside class="sidebar dp-sticky">
			<% include SideNav %>
			<% if $SideBarView %>
				$SideBarView
			<% end_if %>
			$SidebarArea
		</aside>
	</div>
	$AfterContent
</main>


<% if not $BackgroundImage %>
	<div class="column row">
		<div class="main-content__header">
			<h1>$Title</h1>
		</div>
	</div>
<% end_if %>

$BlockArea(BeforeContent)

<div class="row">

	<article role="main" class="main-content main-content--with-padding <% if $Children || $Menu(2) %>main-content--with-sidebar<% else %>main-content--full-width<% end_if %>">
		$BlockArea(BeforeContentConstrained)
		<div class="main-content__text">
		$Content
		</div>
		$BlockArea(AfterContentConstrained)
		$Form
	</article>
	<aside class="sidebar">
		<% include SideNav %>
		$BlockArea(Sidebar)
	</aside>
</div>
$BlockArea(AfterContent)
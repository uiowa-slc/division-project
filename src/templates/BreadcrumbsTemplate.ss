<% if Pages %>
	<nav aria-label="You are here:" role="navigation" class="breadcrumb no-print">
		<div class="column row">
		<ol aria-labelledby="breadcrumblabel" class="clearfix breadcrumb__list">
			<li class="breadcrumb__listitem">
				<a href="$Baseref" class="breadcrumb__anchor"><span class="breadcrumb__name">Home</span></a>
			</li>
			<% loop Pages %>
				<% if Last %>
					<li class="breadcrumb__listitem">
						<strong class="breadcrumb__anchor breadcrumb__anchor--active">$Title.XML</strong>
					</li>
				<% else %>
					<li class="breadcrumb__listitem">
						<a href="$Link" class="breadcrumb__anchor">$MenuTitle.XML</a>
					</li>
				<% end_if %>
			<% end_loop %>
		</ol>
		</div>
	</nav>
<% end_if %>
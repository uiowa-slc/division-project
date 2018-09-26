<section class="content-block__container content-block__container--padding grid-container fluid">
	<% if $ShowTitle %><h2 class="content-block-header content-block-header--with-padding header--centered header--small">$Title</h2><% end_if %>

	<% if $MaxSize = "4x4" %>
		<div class="tile-grid grid-x grid-margin-x small-up-1 medium-up-2 large-up-3 xlarge-up-4">
	<% else_if $MaxSize = "3x3" %>
		<div class="tile-grid grid-x grid-margin-x small-up-1 medium-up-2 large-up-3 xlarge-up-3">
	<% else_if $MaxSize = "2x2" %>
		<div class="tile-grid grid-x grid-margin-x small-up-1 medium-up-2 large-up-2 xlarge-up-2">
	<% end_if %>

	<% if $Source == 'children' %>
	<% with $Holder %>
		<% loop $Children %>
			<a href="$Link" class="tile cell dp-lazy" data-original="$BackgroundImage.FocusFill(300,300).URL">
				<div class="tile__text"><h2 class="tile__header">$Title</h2></div>
			</a>
		<% end_loop %>
	<% end_with %>
	<% else_if $Source == 'manual' %>
		<% loop $CustomPages %>
			<a href="$Link" class="tile cell dp-lazy" data-original="$BackgroundImage.FocusFill(300,300).URL">
				<div class="tile__text"><h2 class="tile__header">$Title</h2></div>
			</a>
		<% end_loop %>
	<% end_if %>
	</div>
</section>
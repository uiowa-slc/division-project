<section class="content-block__container content-block__container--padding grid-container fluid">
	<% if $ShowTitle %><h2 class="content-block-header content-block-header--with-padding header--centered header--small">$Title</h2><% end_if %>
	<div class="tile-grid grid-x grid-margin-x small-up-1 medium-up-2 large-up-3 xlarge-up-4">

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
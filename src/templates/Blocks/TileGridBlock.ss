<section class="content-block__container content-block__container--padding">
	<% if $ShowTitle %><h2 class="content-block-header content-block-header--with-padding header--centered header--small">$Title</h2><% end_if %>
	<div class="tile-grid row small-up-1 medium-up-2 large-up-3 xlarge-up-4">

	<% if $Holder %>
	<% with $Holder %>
		<% loop $Children %>
			<a href="$Link" class="tile column dp-lazy" data-original="$BackgroundImage.FocusFill(300,300).URL">
				<div class="tile__text"><h2 class="tile__header">$Title</h2></div>
			</a>
		<% end_loop %>
	<% end_with %>
	<% else_if $CustomPages %>
		<% loop $CustomPages %>
			<a href="$Link" class="tile column dp-lazy" data-original="$BackgroundImage.FocusFill(300,300).URL">
				<div class="tile__text"><h2 class="tile__header">$Title</h2></div>
			</a>
		<% end_loop %>
	<% end_if %>
	</div>
</section>
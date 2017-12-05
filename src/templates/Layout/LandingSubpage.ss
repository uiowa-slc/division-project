<div class="header__container header__container--dark-header header__container--full">
	<% include DivisionBar %>
</div>

<main class="main-content__container" id="main-content__container">

	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<% include FeaturedImage %>
	<% end_if %>
	<% include MainContentBody %>

</main>

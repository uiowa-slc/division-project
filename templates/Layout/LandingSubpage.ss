<div class="lp-uiowa-bar">
    <% include IowaBar %>
</div>

<main class="main-content__container" id="main-content__container">

	<!-- Background Image Feature -->
	<% if $BackgroundImage %>
		<% include FeaturedImage %>
	<% end_if %>
	<% include MainContentBody %>

</main>

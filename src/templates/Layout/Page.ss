$Header
<div class="main-content__container" id="main-content__container">
	<% if $BackgroundImage %>
		<div class="row-fluid">
			<img src="$BackgroundImage.URL" alt="" role="presentation" class="large-12"/>
		</div>
	<% end_if %>

	<% include MainContentBody %>
</div>
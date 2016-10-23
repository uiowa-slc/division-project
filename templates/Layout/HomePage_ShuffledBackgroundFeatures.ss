
<% include Header %>
<% if $BackgroundFeature %>
	<div class="row-fluid">
		<img src="$BackgroundFeature.Image.URL" alt="" role="presentation" class="large-12"/>
	</div>
<% end_if %>

<% include HomePageContent %>
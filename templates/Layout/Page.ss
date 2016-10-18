<% include Header %>
<% if $BackgroundImage %>
	<div class="row-fluid">
	
			<img src="$BackgroundImage.URL" alt="" role="presentation" class="large-12"/>
	
	</div>
<% end_if %>
<div class="row">	
	<div class="large-7 large-centered columns">
		<article role="main" class="content">
			$Content
			$Form
		</article>
	</div>
</div>
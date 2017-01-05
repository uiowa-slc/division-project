<% if $RelatedNewsEntries %>
	<div class="WidgetHolder">
		<h3>Related News</h3>
		<ul>
		<% loop $RelatedNewsEntries(3) %>
			<% include RelatedNewsContent %>
		<% end_loop %>
		</ul>
	</div>
<% end_if %><!-- end related news -->
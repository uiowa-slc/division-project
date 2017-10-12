
<section class="content-block__container content-block__container--padding" aria-labelledby="Block$ID">
	<div class="content-block">
		<div class="$CSSClasses">
			<div class="upcomingeventsblock__header">
				<h3 id="Block$ID" class="upcomingeventsblock__title"><% if $Title %>$Title<% else %>Upcoming Events<% end_if %></h3>
			</div>
		
			<% if $EventList %>
				<% loop $EventList %>
					<% include EventCard %>
				<% end_loop %>
			<% end_if %>

		</div>
		
		<% if $EventList.Count > 0 %>
			<div class="text-center"><a class="button-outlined" href="$Calendar.Link">See all events</a></div>
		<% else %>
			<div class="text-center"><p>No events are currently listed.</p><a class="button-outlined" href="https://afterclass.uiowa.edu" target="_blank">See more events on campus</a></div>

		<% end_if %>
		
	</div>
</section>


<% with $StaffHolder %>
<div class="stafflist">
<% if $Teams %>
	<% loop $Teams %>
		<h2 class="stafflist__title">$Title</h2>
		<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-3">
		<% if $Up.SortLastName %>
			<% loop $SortedStaffPages.Sort(LastName, ASC) %>
				<% include StaffPageListItem %>
			<% end_loop %>
		<% else %>
			<% loop $SortedStaffPages %>
				<% include StaffPageListItem %>
			<% end_loop %>
		<% end_if %>
		</ul>
	<% end_loop %>
<% else %><%-- end if teams --%>
	<ul class="stafflist__list no-bullet row small-up-1 medium-up-2 large-up-3">
		<% loop $Children %>
			<% include StaffPageListItem %>
		<% end_loop %>
	</ul>
<% end_if %>
</div><%-- end stafflist --%>
<% end_with %>
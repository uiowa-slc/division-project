<div class="container clearfix">
      <section class="staff-content main-content">
      	$Form
      	$Content
            <% if $Teams %>
      	<% loop $Teams %>
                  <h2 class="staff-title">$Title</h2>
                  <ul class="staff-list">
                  <% loop $SortedStaffPages %>
                        <% include StaffPageListItem %>
                  <% end_loop %>
                        <li class="filler"></li>
                        <li class="filler"></li>
                  </ul>
      	<% end_loop %>
            <% else %>
                  <ul class="staff-list">
                  <% loop $Children %>
                        <% include StaffPageListItem %>
                  <% end_loop %>
                        <li class="filler"></li>
                        <li class="filler"></li>
                  </ul>
            <% end_if %>
      	
      </section>
</div>
<% include TopicsAndNews %>

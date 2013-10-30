<div class="container clearfix">
      <section class="staff-content">
      	$Form
      	$Content
      	<% loop Teams %>
                  <h2 class="staff-title">$Title</h2>
                  <ul class="staff-list">
                  <% loop $SortedStaffPages %>
                        <li>
                              <% if $Photo %>
                              <a href="$Link" class="staff-link">
                                    
                                    <img src="$Photo.CroppedImage(350,234).URL" alt="$FirstName $LastName" class="staff-img">
                              </a>
                              <% else %>
                              <a href="$Link" class="staff-link">
                                    
                                    <img src="division-project/images/dosl.png" alt="$FirstName $LastName" class="staff-img">
                              </a>
                              <% end_if %>
                              <p class="staff-name">
                                    <a href="$Link">$FirstName $LastName</a>
                                    <% if $Position %><small class="staff-position">$Position</small><% end_if %>
                              </p>
                        </li>
                  <% end_loop %>
                        <li class="filler"></li>
                        <li class="filler"></li>
                  </ul>
                  
      	<% end_loop %>
      	
      </section>
</div>
<%-- <% include TopicsAndNews %> --%>

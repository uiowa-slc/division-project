<div class="gradient">
      <section class="container clearfix">
            <div class="white-cover"></div>
            <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
            	<h1>$Title</h1>
            	<% if $Photo %>
            		<img src="$Photo.URL" alt="$FirstName $LastName">
            	<% end_if %>
                  <h2>$Position</h2>
                  <ul>
                        <li>Email: <a href="mailto:$EmailAddress">$EmailAddress</a></li>
                        <li>Phone: $Phone</li>
                  <% if $DepartmentName %>
                        <li>
                        <% if $DepartmentURL %>
                              <a href="$DepartmentURL">$DepartmentName</a>
                        <% else %>
                              $DepartmentName
                        <% end_if %>
                        </li>
                  <% end_if %>
                  </ul>
                  
                  $Content
            </section>
            <section class="sec-content">
            	<% include SideNav %>  
            </section>
      </section>
</div>
<%-- <% include TopicsAndNews %> --%>

<% include BackgroundImage %>
<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
		<section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
			<% include MemberDetails %>
			<% if $PaginatedList.Exists %>
			<h2>Posts by $CurrentProfile.FirstName $CurrentProfile.Surname for $Title:</h2>
			<% loop $PaginatedList %>
			<% include PostSummary %>
			<% end_loop %>
			<% end_if %>
			
			$Form
			$CommentsForm
			<% with $PaginatedList %>
			<% include Pagination %>
			<% end_with %>
		</section>
		<section class="sec-content hide-print">
			<% include BlogSideBar %>
			<% include SideNav %>
		</section>
	</div>
</div>
<% include TopicsAndNews %>
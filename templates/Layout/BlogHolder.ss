<% include BackgroundImage %>
<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
	    <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
        <h1>$Title</h1>
				<% if SelectedTag %>
					<div class="selectedTag">
						
						<% _t('VIEWINGTAGGED', 'Viewing entries tagged with') %> '<strong>$SelectedTag</strong>' <a href="$Link">View all entries.</a>
						
					</div>
				<% else_if SelectedDate %>
					<div class="selectedTag">
					
						<% _t('VIEWINGPOSTEDIN', 'Viewing entries posted in') %> <strong>$SelectedNiceDate</strong> <a href="$Link">View all entries.</a>
						
					</div>
				<% end_if %>
				
				<% if BlogEntries %>
					<% loop BlogEntries %>
						<% include BlogSummary %>
					<% end_loop %>
				<% else %>
					<p><% _t('NOENTRIES', 'There are no entries with this tag.') %></p>
				<% end_if %>
				
				<% include BlogPagination %>
        </section>
        <section class="sec-content hide-print">
        	<%-- include SideNav --%>
        	<% include BlogSideBar %>
        </section>
    </div>
</div>
<%-- <% include TopicsAndNews %> --%>
        
    
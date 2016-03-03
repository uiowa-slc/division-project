<% include BackgroundImage %>
<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
	    <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
        $Breadcrumbs
        <h1>$Title</h1>
        	$Content
            <% if $ArchiveYear %>
                <h2><%t Blog.Archive "Archive" %>:
                <% if $ArchiveDay %>
                    $ArchiveDate.Nice
                <% else_if $ArchiveMonth %>
                    $ArchiveDate.format("F, Y")
                <% else %>
                    $ArchiveDate.format("Y")
                <% end_if %>
                </h2>
            <% else_if $CurrentTag %>
                <h2><%t Blog.Tag "Tag" %>: $CurrentTag.Title </h2>
                <p><a href="{$Link}" class="btn">View all posts</a></p>
            <% else_if $CurrentCategory %>
                <h2><%t Blog.Category "Category" %>: $CurrentCategory.Title </h2>
            <% else %>
                
            <% end_if %>

				<% if SelectedTag %>
					<div class="selectedTag">
						
						Viewing entries tagged with : '<strong>$SelectedTag</strong>' <a href="$Link">View all entries.</a>
						
					</div>
				<% else_if SelectedDate %>
					<div class="selectedTag">
					
						<% _t('VIEWINGPOSTEDIN', 'Viewing entries posted in') %> <strong>$SelectedNiceDate</strong> <a href="$Link">View all entries.</a>
						
					</div>
				<% end_if %>
				
				<% if PaginatedList %>
					<% loop PaginatedList %>
						<% include BlogSummary %>
					<% end_loop %>
				<% else %>
					<p><% _t('NOENTRIES', 'There are no entries.') %></p>
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
        
    
<% include BackgroundImage %>
<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
	    <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
            <% if $ArchiveYear %>
                <ul class="breadcrumbs">
                    <li><a href="$Link">$MenuTitle</a></li>
                    <li>Archive: <strong>
                    <% if $ArchiveDay %>
                    $ArchiveDate.Nice
                    <% else_if $ArchiveMonth %>
                        $ArchiveDate.format("F, Y")
                    <% else %>
                        $ArchiveDate.format("Y")
                    <% end_if %>
                        
                    </strong></li>      
                </ul>
                <h1 class="heading--normal-case">
                <% if $ArchiveDay %>
                    $ArchiveDate.Nice
                    <% else_if $ArchiveMonth %>
                        $ArchiveDate.format("F, Y")
                    <% else %>
                        $ArchiveDate.format("Y")
                    <% end_if %></h1>
            <% else_if $CurrentTag %>
                <ul class="breadcrumbs">
                    <li><a href="$Link">$MenuTitle</a></li>
                    <li>Tag: <strong>$CurrentTag.Title</strong></li>      
                </ul>
                <h1 class="heading--normal-case">Filed under: $CurrentTag.Title</h1>
            <% else_if $CurrentCategory %>
                <p><%t Blog.Category "Category" %>: $CurrentCategory.Title </p>
            <% else %>
                <h1>$Title</h1>
            <% end_if %>
        

        	$Content
        	<% if $Content %><hr /><% end_if %>


				
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
        
    
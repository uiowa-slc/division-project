<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
	    <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
	    	
	    	<% if $MainImage %>
			<div>
			<img data-src="$MainImage.URL" src="<% include PlaceholderLargeSrc %>" role="presentation" alt="" />
			</div>
			<% end_if %>
			$Breadcrumbs
	    	<% if not $HideTextTitle %>
	    		<h1>$Title</h1>
	    	<% end_if %>
	    	$Content
	    </section>
	    <section class="sec-content hide-print">
	    	<% include SideNav %>
	    </section>
	</div>
</div>
<%-- <% include TopicsAndNews %> --%>

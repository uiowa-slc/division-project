<% include BackgroundImage %>
<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
	    <article class="main-content <% if $BackgroundImage %>margin-top<% end_if %>" role="main" id="main-content">
	    	$Breadcrumbs
	    	$Content
	    	$Form
	    </article>
	    <section class="sec-content hide-print">
	    	<% include SideNav %>
	    </section>
	</div>
</div>
<% include TopicsAndNews %> 


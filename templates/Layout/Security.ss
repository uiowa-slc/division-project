<% require css(division-project/css/master.css) %>

<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
	    <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
	    	$Form
	    	$Content
	    </section>
	    <section class="sec-content hide-print">
	    	<% include SideNav %>
	    </section>
	</div>
</div>

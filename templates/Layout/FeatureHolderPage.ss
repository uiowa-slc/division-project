<% include BackgroundImage %>
<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
	    <article class="main-content <% if $BackgroundImage %>margin-top<% end_if %>" role="main" id="main-content">
	    	$Breadcrumbs
	    	$Content
	    	$Form
	    	<hr />
			<ul class="justify feature-list">
				<% loop $Children %>
					<li class="item">
						<a href="$Link">
							<% if $FeaturedImage %>
								<img data-src="$FeaturedImage.FocusFill(300,200).URL" src="division-project/images/placeholder.png"alt="$Title">
							<% else %>
								<img data-src="division-project/images/placeholder.png" src="division-project/images/placeholder.png"alt="$Title">
							<% end_if %>
							<h3 class="title">$Title</h3>
							$Content.Summary
						 </a>
					</li>&nbsp;
				<% end_loop %>
					<li class="item filler"></li>
			</ul>
	    </article>
	    <section class="sec-content hide-print">
	    	<% include SideNav %>
	    </section>
	</div>
</div>
<% include TopicsAndNews %> 


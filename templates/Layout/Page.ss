<% include BackgroundImage %>
<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover" role="presentation"></div>
	    <article class="main-content <% if $BackgroundImage %>margin-top<% end_if %>" id="main-content">
	    	<% if $FeatureHolderImage && $Parent.ClassName != "FeatureHolderPage" %>
	    		<img src="<% include PlaceholderLargeSrc %>" data-src="$FeatureHolderImage.ScaleWidth(820).URL" alt="" role="presentational" />
	    	<% end_if %>
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


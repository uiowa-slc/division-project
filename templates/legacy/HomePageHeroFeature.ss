<div class="legacy-hp__hero-article clearfix">
    <% if $Image %>
    	<% if $ExternalLink %>
    		<a href="$ExternalLink" target="_blank"><img src="$Image.ScaleWidth(250).URL" role="presentation" alt=""></a>
    	<% else %>
        	<a href="$AssociatedPage.Link"><img src="$Image.ScaleWidth(250).URL" role="presentation" alt=""></a>
        <% end_if %>
    <% end_if %>
    <h3 class="legacy-hp__hero-title">
        <% if $ExternalLink %>
        	<a href="$ExternalLink" target="_blank">$Title</a>
        <% else %>
        	<a href="$AssociatedPage.Link">$Title</a>
        <% end_if %>
    </h3>
    <div class="legacy-hp__hero-content">$Content</div>
    <% if $ExternalLink %>
    	<a href="$ExternalLink" target="_blank" class="legacy-hp__hero-link">Read More</a>
    <% else %>
    	<a href="$AssociatedPage.Link" class="legacy-hp__hero-link">Read More</a>
    <% end_if %>
</div>

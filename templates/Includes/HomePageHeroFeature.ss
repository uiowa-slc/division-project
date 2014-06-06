<div class="hero-article clearfix">
    <% if $Image %>
    	<% if $ExternalLink %>
    		<a href="$ExternalLink" target="_blank"><img src="$Image.URL" alt=""></a>
    	<% else %>
        	<a href="$AssociatedPage.Link"><img src="$Image.URL" alt=""></a>
        <% end_if %>
    <% end_if %>
    <h3 class="hero-title">
        <% if $ExternalLink %>
        	<a href="$ExternalLink" target="_blank">$Title</a>
        <% else %>
        	<a href="$AssociatedPage.Link">$Title</a>
        <% end_if %>
    </h3>
    <div class="hero-content">$Content</div>
    <% if $ExternalLink %>
    	<a href="$ExternalLink" target="_blank" class="hero-link">Read More</a>
    <% else %>
    	<a href="$AssociatedPage.Link" class="hero-link">Read More</a>
    <% end_if %>
</div>

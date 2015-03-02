<div class="hero-article clearfix">
    <% if $Image %>
    	<% if $ExternalLink %>
    		<a href="$ExternalLink" target="_blank"><img data-src="$Image.SetWidth(250).URL" alt="An image taht represents $Title"></a>
    	<% else %>
        	<a href="$AssociatedPage.Link"><img data-src="$Image.SetWidth(250).URL" alt="An image that represents $Title"></a>
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


<div class="legacy-hp__module">
    <div class="legacy-hp__media">
    <% if $YouTubeEmbed %>
        $YouTubeEmbed
        <% if $ExternalLink %>
            <a href="$ExternalLink" class="legacy-hp__feature-link" target="_blank">
        <% else %>
            <a href="$AssociatedPage.Link" class="legacy-hp__feature-link">
        <% end_if %>  
        <div class="legacy-hp__inner">
            <h3>$Title</h3>
            $Content
            <% include legacy/HomePageFeatureFeedList %>        
        </div>
        </a> 
    <% else %>
        <% if $ExternalLink %>
            <a href="$ExternalLink" class="legacy-hp__feature-link" target="_blank">
        <% else %>
            <a href="$AssociatedPage.Link" class="legacy-hp__feature-link">
        <% end_if %>
        <% if $Image %><img src="$Image.Fill(350,197).URL" role="presentation" alt=""><% end_if %>
        <div class="legacy-hp__inner">
            <h3>$Title</h3>
            $Content
            <% include legacy/HomePageFeatureFeedList %>        
        </div>
        </a>
    <% end_if %>


    </div>

</div>

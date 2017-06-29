<div class="legacy-hp__module">
    <div class="legacy-hp__media">
    <% if $YouTubeEmbed %>
    	$YouTubeEmbed
    <% else %>

    <% if $Image %>
        <% if $ExternalLink %>
          <a href="$ExternalLink" target="_blank">
        <% else %>
            <a href="$AssociatedPage.Link">
        <% end_if %>
                <img src="$Image.Fill(350,197).URL" role="presentation" alt="">

            </a>
        <% end_if %>
    <% end_if %>
    </div>
    <div class="legacy-hp__inner">
        <h3>
        <% if $ExternalLink %>
          <a href="$ExternalLink" target="_blank">
        <% else %>
          <a href="$AssociatedPage.Link">
        <% end_if %>
        	$Title</a>
      </h3>
        	$Content
            <% include HomePageFeatureFeedList %>
    </div>
</div>

<div class="module">
    <div class="media">
    <% if $YouTubeEmbed %>
    	$YouTubeEmbed
    <% else %>
    <% if $ExternalLink %>
      <a href="$ExternalLink" target="_blank">
    <% else %>
        <a href="$AssociatedPage.Link">
    <% end_if %>
            <img src="$Image.CroppedImage(350,197).URL" alt="$Title">
        </a>
    <% end_if %>
    </div>
    <div class="inner">
        <h3>
        <% if $ExternalLink %>
          <a href="$ExternalLink" target="_blank">
        <% else %>
          <a href="$AssociatedPage.Link">
        <% end_if %>
        	$Title</a>
      </h3>
        	$Content
    </div>
</div>
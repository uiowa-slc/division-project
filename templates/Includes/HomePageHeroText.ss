	        <div class="hero-text">
	        	<% if $BackgroundFeature.Tagline %>
	        		<h2 class="blocktext">$BackgroundFeature.Tagline</h2>
	        	<% else %>
                	<h2 class="blocktext">$SiteConfig.Tagline</h2>
                <% end_if %>
                <% if $BackgroundFeature.Buttons %>
                	$BackgroundFeature.Buttons
  				<% end_if %>
            </div>
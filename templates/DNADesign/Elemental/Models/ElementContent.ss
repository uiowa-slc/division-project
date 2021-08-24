<% if $AreaName == "SidebarArea" %>
<section class="content-block__container">
	<div class="$SimpleClassName.LowerCase">
		<div class="content-block textblock">
		<% if $Image %>
			<% if $ExternalLink %>
				<a href="$ExternalLink" class="textblock__image-container" target="_blank">
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy textblock__image" data-original="$Image.FocusFill(600,425).URL" width="600" height="425" alt="$Title">
				</a>
			<% else %>
				<span class="textblock__image-container">
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy textblock__image" data-original="$Image.FocusFill(600,425).URL" width="600" height="425" alt="$Title">
				</span>
			<% end_if %>
		<% end_if %>
        <% if $ShowTitle %>
            <h3 class="textblock__header separator-left">$Title</h3>
        <% end_if %>
		<% if $HTML %>
			<div class="textblock__text">
    			$HTML
    			<% if $ExternalLink %>
    				<div class="featuredpageblock__button">
    					<a href="$ExternalLink" class="border-effect" target="_blank">Learn More</a>
    				</div>
    			<% end_if %>
			</div>
		<% end_if %>
		</div>
	</div>
</section>

<% else %>

<section class="content-block__container">
	<div class="content-block row column">

			<div class="textblock contentblock">
				<% if $ShowTitle %>
                    <h3 class="textblock__header separator-left">$Title</h3>
                <% end_if %>
				<% if $HTML %>
					<div class="textblock__text <% if $Image %>large-8 column<% end_if %>">

					$HTML
					<% if $ExternalLink %>
						<div class="featuredpageblock__button">
							<a href="$ExternalLink" class="border-effect" target="_blank">Learn More</a>
						</div>
					<% end_if %>
					</div>

				<% end_if %>
				<% if $Image %>
					<div class="large-4 columns">
						<% if $ExternalLink %>

								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy textblock__image" data-original="$Image.FocusFill(600,425).URL" width="600" height="425" alt="$Title">

						<% else %>
							<span class="border-effect textblock__image-container">
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="dp-lazy textblock__image" data-original="$Image.FocusFill(600,425).URL" width="600" height="425" alt="$Title">
							</span>
						<% end_if %>
					</div>
				<% end_if %>
			</div>
	</div>
</section>

<% end_if %>


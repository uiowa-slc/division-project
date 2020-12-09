<div class="row">
	<div class="large-12 columns">
		<section class="content-block__container content-block__container--padding">
			<div class="content-block">
				<% if $ShowTitle %>

                        <h2 class="embed-block__header">

                                $Title
                        </h2>
                <% end_if %>

				<div class="embed-block__embed-container <% if $EmbedMethod == "automatic" %>responsive-embed {$Shape} <% else %>embed-block__embed-container--manual unresponsive-embed<% end_if %>">
					<iframe class="embed-block__iframe dp-lazy" width="$Width" height="$Height"data-original="$EmbeddedURL" frameborder="0" allowfullscreen></iframe>
				</div>

                <% if $LinkEmbedTo && $LinkTitle %>
                <div class="embed-block-link-area">

                    <a href="$LinkEmbedTo" class="button large hollow" target="_blank">
                        <% if $Image %>
                            <img class="embed-block__image" alt="" role="presentation" src="$Image.ScaleWidth(30).URL" />
                        <% end_if %>
                        $LinkTitle
                    </a>

                </div>
                <% end_if %>
			</div>
		</section>
	</div>
</div>


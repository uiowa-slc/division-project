<!-- Loop Children -->
<% if $Children %>
    <section class="childpages" aria-labelledby="ChildPages">
    <h2 class="show-for-sr" id="ChildPages">Related Navigation</h2>
    <% loop $Children %>
        <div class="childpages__page <% if $BackgroundImage || $MainImage || $YoutubeBackgroundEmbed || $HeaderImage%>childpages--withphoto<% end_if %>">
            <a href="$Link" class="childpages__blocklink">
                <% if $BackgroundImage %>
                    <img src="$BackgroundImage.FocusFill(180,150).URL" width="180" height="150" class="childpages__img" alt="$Title" loading="lazy">
                <% else_if $MainImage %>
                    <img src="$MainImage.FocusFill(180,150).URL" width="180" height="150" class="childpages__img" alt="$Title" loading="lazy">
                <% else_if $HeaderImage %>
                    <img src="$HeaderImage.FocusFill(180,150).URL" width="180" height="150" class="childpages__img" alt="$Title" loading="lazy">
                <% end_if %>
                <div class="clearfix childpages__content">
                    <h3 class="childpages__title">$Title</h3>
                    <% if $MetaDescription %>
                        <p class="childpages__summary">$MetaDescription</p>
                    <% else %>
                        <% if $Content %>
                            <p class="childpages__summary">$Content.FirstSentence</p>
                        <% end_if %>
                    <% end_if %>
                    <span class="button">Learn More <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>
        </div>
    <% end_loop %>
    </section>
<% end_if %>
<!-- end Loop Children -->

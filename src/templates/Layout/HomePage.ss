
$Header


<div class="hero <% if $SubHeading || $ButtonTextOne %>hero--content<% end_if %> hero--$Position">
    <div class="hero__imgwrap hero__imgwrap--$Size hero__imgwrap--$Background"
        <% if $Background = "image" %>
            <% if $HeroImage %>
                data-interchange="[$HeroImage.FocusFill(768,400).URL, small], [$HeroImage.FocusFill(1024,400).URL, medium], [$HeroImage.FocusFill(1700,638).URL, large]" style="background-position: {$HeroImage.PercentageX}% {$HeroImage.PercentageY}%"
            <% else %>
                style="background-image:url({$ThemeDir}/dist/images/hero-placeholder.jpg)"
            <% end_if %>
        <% end_if %>
    >
        <% if $Background = "video" %>
            <button onclick="playPause()" id="play-pause" class="pause" role="button" aria-pressed="false" aria-label="pause">
                <span class="show-for-sr">Pause</span>
            </button>
            <video autoplay muted loop id="hero__video">
                <source src="$HeroVideo.URL" type="video/mp4">
            </video>
        <% end_if %>

    </div>

    <% if $SubHeading || $ButtonUrlOne || $ButtonUrlTwo || $ButtonUrlThree %>
        <div class="hero__contentwrap grid-container">
            <div class="hero__content">
                <% if $SubHeading %>
                    <h2 class="hero__header">$SubHeading</h2>
                <% end_if %>
                <% if $ButtonUrlOne %>
                    <a href="$ButtonUrlOne" class="button">$ButtonTextOne <i class="fas fa-arrow-right"></i></a>
                <% end_if %>
                <% if $ButtonUrlTwo %>
                    <a href="$ButtonUrlTwo" class="button">$ButtonTextTwo <i class="fas fa-arrow-right"></i></a>
                <% end_if %>
                <% if $ButtonUrlThree %>
                    <a href="$ButtonUrlThree" class="button">$ButtonTextThree <i class="fas fa-arrow-right"></i></a>
                <% end_if %>
            </div>
        </div>
    <% end_if %>
</div>


$BeforeContent

<!-- Feature Sections -->
<% if $NewHomePageHeroFeatures %>
    <div class="homefeatures <% if $DarkerFeatureBackground %>homefeatures--darker-bg<% end_if %>">
    <% loop NewHomePageHeroFeatures %>
            <div class="homefeatures__feature">
                <div class="grid-container">
                    <div class="grid-x align-middle">
                        <% if $Image %>
                            <% with $Image %>
                                <div class="cell small-12 medium-7 <% if $Up.Even %>medium-order-2<% end_if %>">
                                    <img src="$FocusFill(800,500).URL" alt="$Title" loading="lazy" width="800" height="500">
                                </div>
                            <% end_with %>
                        <% end_if %>
                        <div class="cell small-12 medium-5 <% if $Even %>medium-order-1<% end_if %>">
                            <div class="homefeatures__content">
                            <h3 style="margin-top:0;">$Title </h3>
                                $Content
                                <% if $ButtonText %>
                                    <% if $ExternalLink %>
                                        <a href="$ExternalLink" target="_blank" class="button warning">$ButtonText <i class="fas fa-arrow-right"></i></a>
                                    <% else %>
                                        <a href="$AssociatedPage.Link" class="button warning">$ButtonText <i class="fas fa-arrow-right"></i></a>
                                    <% end_if %>
                                <% end_if  %>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <% end_loop %>
    </div>
<% end_if %>


$AfterContent

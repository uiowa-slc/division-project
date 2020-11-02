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
                    <h2>$SubHeading</h2>
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

$Header

<section class="hero <% if $SubHeading || $ButtonTextOne %>hero--content<% end_if %> <% if $CenterText %>hero--center<% end_if %>">
    <div class="hero__imgwrap">
        <% if $BackgroundImage %>
            <img 
                alt="$BackgroundImage.Title" 
                sizes="(min-width:1440px) 1440px, 100vw" 
                srcset="
                    $BackgroundImage.FocusFill(380,146).URL 384w,
                    $BackgroundImage.FocusFill(768,295).URL 768w,
                    $BackgroundImage.FocusFill(1024,394).URL 1024w,
                    $BackgroundImage.FocusFill(1440,554).URL 1440w,
                    $BackgroundImage.FocusFill(1920,738).URL 1920w" 
                src="$BackgroundImage.FocusFill(1024,394).URL"
            >
        <% else %>
            <img src="{$ThemeDir}/dist/images/hero-placeholder.jpg" alt="Students sitting in front of the Old Capitol building ">
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
</section>

$BeforeContent

<!-- Feature Sections -->
<% if $NewHomePageHeroFeatures %>
    <div class="homefeatures">
    <% loop NewHomePageHeroFeatures %>
            <div class="homefeatures__feature">
                <div class="grid-container">
                    <div class="grid-x align-middle">
                        <% if $Image %>
                            <% with $Image %>
                                <div class="cell small-12 medium-7 <% if $Up.Even %>medium-order-2<% end_if %>">
                                    <img src="$FocusFill(800,500).URL" alt="$Title" loading="lazy">
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
<% include FooterLogoArea %>
<% cached %>
<footer class="footer">
	<div class="footer__container ">
		<div class="footer__info">
			<% if $SiteConfig.FooterLogo %>
				<div class="footer__logo">
					<img loading="lazy" src="$SiteConfig.FooterLogo.URL" alt="$SiteConfig.Title Logo">
				</div>
			<% else_if $SiteConfig.DisableDivisionBranding %>
				<a href="http://uiowa.edu" class="footer__logo footer__logo--ui" aria-label="Visit the University of Iowa website"><img loading="lazy" src="{$ThemeDir}/dist/images/ui-logo-footer.png" alt="The University of Iowa logo"></a>
			<% else %>
				<a href="http://studentlife.uiowa.edu" class="footer__logo" aria-label="Visit the Division of Student Life website"><img loading="lazy" width="300" height="81
			" src="{$ThemeDir}/dist/images/dosl-uiowa.png" alt="Division Of Student Life"></a>
			<% end_if %>
			<% if $SiteConfig.GroupSummary %>
				<div class="footer__summary">$SiteConfig.GroupSummary</div>
			<% else_if $SiteConfig.DisableDivisionBranding %>
				<div class="footer__summary"><p>In pursuing its missions of teaching, research, and service, the University seeks to advance scholarly and creative endeavor through leading-edge research and artistic production; to use this research and creativity to enhance undergraduate, graduate, and professional education, health care, and other services provided to the people of Iowa, the nation, and the world; and to educate students for success and personal fulfillment in a diverse world.</p></div>
			<% else_if $SiteConfig.Tagline %>
				<div class="footer__summary"><p>$SiteConfig.Tagline</p></div>
			<% else %>
				<div class="footer__summary"><p>The Division of Student Life fosters student success by creating and promoting inclusive educationally purposeful services and activities within and beyond the classroom.</p></div>
			<% end_if %>

			<div class="footer__address" itemscope itemtype="http://schema.org/PostalAddress">
				<% with $SiteConfig %>
				<p>
					<% if $Address1 || $PhoneNumber || $PhoneNumberAlt || $Fax || $EmailAddress %>
						<span itemprop="streetAddress">$Address1</span>
                        <% if $City %><br /><span itemprop="addressLocality">$City</span><% end_if %><% if $State %>, <span itemprop="addressRegion">$State</span><% end_if %><% if $Zipcode %> <span itemprop="postalCode">$Zipcode</span><br /><% end_if %>
                        
                        <% if $PhoneNumber %>
                            <br />
                            <a href="tel:$PhoneNumber">
                                <i class="fas fa-phone"></i>$PhoneNumber
                            </a>
                        <% end_if %>
                        
						<% if $PhoneNumberAlt %>
							<br /><i class="fas fa-phone"></i>$PhoneNumberAlt
                        <% end_if %>
                        
						<% if $Fax %>
                            <br /> <i class="fas fa-fax"></i>$Fax
                        <% end_if %>
                        
						<% if $EmailAddress %>
                            <br />
                            <a href="mailto:$EmailAddress">
                                <i class="fas fa-envelope-open"></i>$EmailAddress
                            </a>
						<% end_if %>
					<% end_if %>
				</p>
				<% end_with %>
            </div>
            <% if $SiteConfig.FacebookLink || $SiteConfig.TwitterLink || $SiteConfig.VimeoLink || $SiteConfig.YouTubeLink || $SiteConfig.InstagramLink || $SiteConfig.LinkedInLink || $SiteConfig.PinterestLink || $SiteConfig.FlickrLink %>
                <nav aria-labelledby="footer-social">
                    <h2 class="show-for-sr" id="footer-social">Social Media</h2>
                    <ul class="footer__socialmedia">
                        <% if $SiteConfig.FacebookLink %>
                            <li>
                                <a href="$SiteConfig.FacebookLink" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-facebook-square"></i>
                                    <span class="show-for-sr">Facebook</span>
                                </a>
                            </li>
                        <% end_if %>
                        <% if $SiteConfig.TwitterLink %>
                            <li>
                                <a href="$SiteConfig.TwitterLink" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-twitter-square"></i>
                                    <span class="show-for-sr">Twitter</span>
                                </a>
                            </li>
                        <% end_if %>
                        <% if $SiteConfig.VimeoLink %>
                            <li>
                                <a href="$SiteConfig.VimeoLink" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-vimeo-square"></i>
                                    <span class="show-for-sr">Vimeo</span>
                                </a>
                            </li>
                        <% end_if %>
                        <% if $SiteConfig.YouTubeLink %>
                            <li>
                                <a href="$SiteConfig.YouTubeLink" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-youtube"></i>
                                    <span class="show-for-sr">Youtube</span>
                                </a>
                            </li>
                        <% end_if %>
                        <% if $SiteConfig.InstagramLink %>
                            <li>
                                <a href="$SiteConfig.InstagramLink" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-instagram"></i>
                                    <span class="show-for-sr">Instagram</span>
                                </a>
                            </li>
                        <% end_if %>
                        <% if $SiteConfig.LinkedInLink %>
                            <li>
                                <a href="$SiteConfig.LinkedInLink" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-linkedin-in"></i>
                                    <span class="show-for-sr">LinkedIn</span>
                                </a>
                            </li>
                        <% end_if %>
                        <% if $SiteConfig.PinterestLink %>
                            <li>
                                <a href="$SiteConfig.PinterestLink" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-pinterest"></i>
                                    <span class="show-for-sr">Pinterest</span>
                                </a>
                            </li>
                        <% end_if %>
                        <% if $SiteConfig.FlickrLink %>
                            <li>
                                <a href="$SiteConfig.FlickrLink" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-flickr"></i>
                                    <span class="show-for-sr">Flickr</span>
                                </a>
                            </li>
                        <% end_if %>
                        <% if $SiteConfig.Github %>
                            <li>
                                <a href="$SiteConfig.Github" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-github-square"></i>
                                    <span class="show-for-sr">Github</span>
                                </a>
                            </li>
                        <% end_if %>
                        <% if $SiteConfig.Snapchat %>
                            <li>
                                <a href="https://www.snapchat.com/add/$SiteConfig.Snapchat" target="_blank"  rel="noopener noreferrer">
                                    <i class="fab fa-snapchat"></i>
                                    <span class="show-for-sr">Snapchat</span>
                                </a>
                            </li>
                        <% end_if %>
                    </ul>
                    
                </nav>
            <% end_if %>
		</div>
		<div class="footer__navigation <% if $SiteConfig.ButtonUrlOne || $SiteConfig.ButtonUrlTwo || $SiteConfig.ButtonUrlThree %>footer__navigation--with-buttons <% end_if %>">
			<div class="footer__links">
				<ul class="clearfix">
					<% loop Menu(1) %>
						<li><a href="$Link">$MenuTitle</a></li>
					<% end_loop %>
				</ul>
			</div>

			<% if $SiteConfig.ButtonUrlOne || $SiteConfig.ButtonUrlTwo || $SiteConfig.ButtonUrlThree %>
				<div class="footer__buttons">
					<% if $SiteConfig.ButtonUrlOne %>
						<a href="$SiteConfig.ButtonUrlOne" class="button hollow footer__give" target="_blank">$SiteConfig.ButtonTextOne <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span></a>
					<% end_if %>
					<% if $SiteConfig.ButtonUrlTwo %>
						<a href="$SiteConfig.ButtonUrlTwo" class="button hollow footer__give" target="_blank">$SiteConfig.ButtonTextTwo <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span></a>
					<% end_if %>
					<% if $SiteConfig.ButtonUrlThree %>
						<a href="$SiteConfig.ButtonUrlThree" class="button hollow footer__give" target="_blank">$SiteConfig.ButtonTextThree <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span></a>
					<% end_if %>
				</div>
			<% end_if %>
        </div>
        <% if $SiteConfig.Disclaimer %>
            <div class="footer__disclaimer">
                $SiteConfig.Disclaimer
            </div>
        <% end_if %>
	</div>
    <% include FooterCopyright %>
</footer>
<% end_cached %>

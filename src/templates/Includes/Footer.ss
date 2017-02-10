<footer class="footer" role="contentinfo">
	<div class="footer__container">
		<div class="footer__info">
			<% if $SiteConfig.DisableDivisionBranding %>
				<a href="http://uiowa.edu" class="footer__logo"><img src="division-project/images/ui-logo-footer.png" alt="The University of Iowa"></a>
			<% else %>
				<a href="http://studentlife.uiowa.edu" class="footer__logo"><img src="{$ThemeDir}/dist/images/dosl-uiowa.png" alt="Division Of Student Life"></a>
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

			<div class="footer__location">
				<p>$SiteConfig.Address
					<% if $SiteConfig.PhoneNumber %>
						<br /><br />$SiteConfig.PhoneNumber
					<% end_if %>
					<% if $SiteConfig.EmailAddress %>
						<br /><br />$SiteConfig.EmailAddress
					<% end_if %>
				</p>
			</div>
		</div>
		<div class="footer__navigation">
			<div class="">
				<h3 class="footer__heading">Website Navigation</h3>
			</div>
			<div class="footer__links">
				<ul class="clearfix">
					<% loop Menu(1) %>
						<li><a href="$Link">$MenuTitle</a></li>
					<% end_loop %>
					<% if $SiteConfig.QuickLinkTitleOne %>
						<li><a href="$SiteConfig.QuickLinkURLOne">$SiteConfig.QuickLinkTitleOne</a></li>
					<% end_if %>
					<% if $SiteConfig.QuickLinkTitleTwo %>
						<li><a href="$SiteConfig.QuickLinkURLTwo">$SiteConfig.QuickLinkTitleTwo</a></li>
					<% end_if %>
					<% if $SiteConfig.QuickLinkTitleThree %>
						<li><a href="$SiteConfig.QuickLinkURLThree">$SiteConfig.QuickLinkTitleThree</a></li>
					<% end_if %>
				</ul>
			</div>

			<% if $SiteConfig.DisableDivisionBranding %>
			<% else %>
				<div class="footer__buttons">
					<% if $SiteConfig.DonateButtonUrl %>
						<a href="$SiteConfig.DonateButtonUrl" class="footer__give" target="_blank">Give Online Now</a>
					<% end_if %>
					<a href="#" class="footer__give">Appointment</a>
				</div>
			<% end_if %>
		</div>

		<div class="footer__socialmedia">
			<h3 class="footer__heading">Social Media</h3>
			<ul class="">
				<% if $SiteConfig.FacebookLink %>
					<li><a href="$SiteConfig.FacebookLink" target="_blank" class="footer__facebook">Facebook</a></li>
				<% end_if %>
				<% if $SiteConfig.TwitterLink %>
					<li><a href="$SiteConfig.TwitterLink" target="_blank" class="footer__twitter">Twitter</a></li>
				<% end_if %>
				<% if $SiteConfig.VimeoLink %>
					<li><a href="$SiteConfig.VimeoLink" target="_blank" class="footer__vimeo">Vimeo</li>
				<% end_if %>
				<% if $SiteConfig.YouTubeLink %>
					<li><a href="$SiteConfig.YouTubeLink" target="_blank" class="footer__youtube">Youtube</a></li>
				<% end_if %>
				<% if $SiteConfig.InstagramLink %>
					<li><a href="$SiteConfig.InstagramLink" target="_blank" class="footer__instagram">Instagram</a></li>
				<% end_if %>
				<% if $SiteConfig.LinkedInLink %>
					<li><a href="$SiteConfig.LinkedInLink" target="_blank" class="footer__linkedin">LinkedIn</a></li>
				<% end_if %>
				<% if $SiteConfig.PinterestLink %>
					<li><a href="$SiteConfig.PinterestLink" target="_blank" class="footer__pinterest">Pinterest</a></li>
				<% end_if %>
				<% if $SiteConfig.FlickrLink %>
					<li><a href="$SiteConfig.FlickrLink" target="_blank" class="footer__flickr">Flickr</a></li>
				<% end_if %>
			</ul>
		</div>
	</div>
	<div class="footer__copyrightcontainer <% if $SiteConfig.MailChimpFormEmbed %>footer__copyrightcontainer--newsletter<% end_if %>">
		<div class="footer__copyrightrow">
			<div class="footer__copyright">
				<p>&copy; $Now.Year <a href="http://www.uiowa.edu/" target="_blank">The University of Iowa</a>. All Rights Reserved. <a href="http://www.uiowa.edu/homepage/online-privacy-information" target="_blank">Privacy Information</a> | Created by <a href="https://md.studentlife.uiowa.edu/" target="_blank" class="footer__md">Student Life Marketing and Design</a></p>
			</div>

			<div class="footer__newsletter">
				<% if $SiteConfig.MailChimpFormEmbed %>
					$SiteConfig.MailChimpFormEmbed
				<% end_if %>
			</div>
		</div>
	</div>
</footer>

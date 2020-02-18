    <div class="footer__copyrightcontainer <% if $SiteConfig.MailChimpFormEmbed %>footer__copyrightcontainer--newsletter<% end_if %>">
        <div class="footer__copyrightrow">
            <div class="footer__copyright">
                <p>&copy; $Now.Year <a href="http://www.uiowa.edu/" target="_blank">The University of Iowa</a>. All Rights Reserved. <a href="http://www.uiowa.edu/homepage/online-privacy-information" target="_blank">Privacy Information</a> | Created by <a href="https://md.studentlife.uiowa.edu/" target="_blank" class="footer__md">Student Life Marketing and Design</a></p>
            </div>
            <% if $SiteConfig.MailChimpFormEmbed %>
            <div class="footer__newsletter">
                $SiteConfig.MailChimpFormEmbed
            </div>
            <% end_if %>
        </div>
    </div>

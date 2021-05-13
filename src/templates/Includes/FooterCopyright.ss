    <div class="footer__copyrightcontainer <% if $SiteConfig.MailChimpFormEmbed %>footer__copyrightcontainer--newsletter<% end_if %>">
        <div class="footer__copyrightrow">
            <div class="footer__copyright">
                <p>&copy; $Now.Year <a href="http://www.uiowa.edu/" target="_blank" rel="noopener">The University of Iowa</a>. All Rights Reserved. | <a href="http://www.uiowa.edu/homepage/online-privacy-information" target="_blank" rel="noopener"> Privacy Information</a> | <a href="https://opsmanual.uiowa.edu/community-policies/nondiscrimination-statement" target="_blank" rel="noopener">Nondiscrimination Statement</a> | <a href="https://uiowa.edu/accessibility" target="_blank" rel="noopener">Accessibility</a> | <a href="https://nativeamericancouncil.org.uiowa.edu/" class="footer__bar-link" target="_blank" rel="noopener">UI Indigenous Land Acknowledgement</a> | Created by <a href="https://slc.studentlife.uiowa.edu/" target="_blank" rel="noopener">Student Life Communications</a></p>
            </div>
            <% if $SiteConfig.MailChimpFormEmbed %>
            <div class="footer__newsletter">
                $SiteConfig.MailChimpFormEmbed
            </div>
            <% end_if %>
        </div>
    </div>

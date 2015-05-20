<footer class="footer clearfix" role="contentinfo">
    <div class="container">
        <div class="colgroup">
			<div class="col-1-2">
				<a href="http://studentlife.uiowa.edu" class="hide-print dsl-footer"><img src="http://vp.studentlife.uiowa.edu/division-project/images/dosl-uiowa.png" alt="Division Of Student Life Logo"></a><br>
				<% if $SiteConfig.GroupSummary %>
					<p>$SiteConfig.GroupSummary</p>
				<% else %>
					<p>The Division of Student Life fosters student success by creating and promoting inclusive educationally purposeful services and activities within and beyond the classroom.</p>
				<% end_if %>
				<p>$SiteConfig.Address
				<% if $SiteConfig.PhoneNumber %>
					<br />Phone: $SiteConfig.PhoneNumber
				<% end_if %>
				<% if $SiteConfig.EmailAddress %>
					<br />Email: <a href="mailto:{$SiteConfig.EmailAddress}">$SiteConfig.EmailAddress</a>
				<% end_if %>
			</p>
				
			</div>
			<div class="col-1-4 hide-print">
				<div class="colgroup">
					<ul class="footer-nav">
						<% if $SiteConfig.FacebookLink %>
							<li><a href="$SiteConfig.FacebookLink" target="_blank"><span class="social-icon">F</span> Facebook</a></li>
						<% end_if %>
						<% if $SiteConfig.TwitterLink %>
							<li><a href="$SiteConfig.TwitterLink" target="_blank"><span class="social-icon">t</span> Twitter</a></li>
						<% end_if %>
						<% if $SiteConfig.VimeoLink %>
							<li><a href="$SiteConfig.VimeoLink" target="_blank"><span class="social-icon">v</span> Vimeo</a></li>
						<% end_if %>
						<% if $SiteConfig.YouTubeLink %>
							<li><a href="$SiteConfig.YouTubeLink" target="_blank"><span class="social-icon">y</span> Youtube</a></li>
						<% end_if %>
					</ul>
					<ul class="footer-nav">
						<% loop Menu(1) %>
							<li><a href="$Link">$MenuTitle</a></li>
						<% end_loop %>
					</ul>
				</div>
			</div>
			<div class="col-1-4 hide-print">
			<% include FooterRightContent %>
			</div>
        </div>
        <hr>
        <% include FooterCopyrightPrivacy %>
    </div>
</footer>


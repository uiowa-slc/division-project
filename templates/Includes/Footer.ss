<footer class="footer clearfix" role="contentinfo">
    <div class="container">
        <div class="colgroup">
			<div class="col-1-2">
				<a href="http://studentlife.uiowa.edu" class="hide-print dsl-footer"><img src="division-project/images/dosl-uiowa.png" alt="Division Of Student Life Logo"></a><br>
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
						<li><a href="$SiteConfig.FacebookLink" target="_blank"><i class="icon-facebook"></i> Facebook</a></li>
						<% end_if %>
						<% if $SiteConfig.TwitterLink %>
						<li><a href="$SiteConfig.TwitterLink" target="_blank"><i class="icon-twitter"></i> Twitter</a></li>
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
				<h4>Support The Division</h4>
				
				<a href="https://www.givetoiowa.org/GiveToIowa/WebObjects/GiveToIowa.woa/wa/goTo?area=studentlife" class="appt-btn">Give Online Now</a>
			</div>
        </div>
        <hr>
        <% include FooterCopyrightPrivacy %>
    </div>
</footer>


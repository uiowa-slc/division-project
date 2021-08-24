<section class="content-block__container content-block__container--padding" aria-labelledby="Block$ID">
	<div class="content-block">
		<div class="staffmemberblock">
		<% if $StaffPage.Photo %>
			<div class="staffmemberblock__media">
				<a href="$StaffPage.Link">
					<img src="$StaffPage.Photo.FocusFill(600,425).URL" alt="$StaffPage.Title">
				</a>
			</div>
		<% end_if %>
		<div class="staffmemberblock__body">
			<h3 id="Block$ID" class="staffmemberblock__title separator-left">$StaffPage.Title</h3>
			<div class="staffmemberblock__desc">
				<p class="staffmemberblock__position">
                    <em>$StaffPage.Position</em>
                </p>
				<ul class="staffmemberblock__contact">
					<% if $StaffPage.EmailAddress %>
					<li><img src="{$ThemeDir}/dist/images/mail.png" alt="email"> <a href="mailto:$StaffPage.EmailAddress">$StaffPage.EmailAddress</a></li>
					<% end_if %>
					<% if $StaffPage.Phone %>
						<li><img src="{$ThemeDir}/dist/images/call.png" alt="Phone number"> $StaffPage.Phone</li>
					<% end_if %>
				</ul>
			</div>
			<div class="staffmemberblock__button">
				<a href="$StaffPage.Link" class="button gold small" aria-label="View profile for $StaffPage.Title">View Profile</a>
			</div>
		</div>
		</div>
	</div>
</section>


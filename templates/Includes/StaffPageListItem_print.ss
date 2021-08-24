<li class="column stafflist__item">


		<span class="stafflist__link">
			<% if $Photo %>
				<div class="stafflist__img">
					<img class="dp-lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="$Photo.FocusFill(350,234).URL" width="350" height="234" alt="$FullName">
				</div>
			<% else %>
				<div href="$Link" class="stafflist__img">
					<img class="dp-lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="{$ThemeDir}/dist/images/dosl.png" width="350" height="234" alt="Placeholder photo for $FullName">
				</div>
			<% end_if %>

			<h3>$FullName</h3>

				<% if $Position %><em class="stafflist__position">$Position</em><% end_if %>
				<% if $SecondaryTitle %><em class="stafflist__position">$SecondaryTitle</em><% end_if %>
				<% if $EmailAddress %><span class="stafflist__email">$EmailAddress</span><% end_if %>
				<% if $Phone %><span class="stafflist__phone">$Phone</span><% end_if %>
				</p>

		</span>

</li>

<li class="column stafflist__item">
	<a href="$Link" class="stafflist__link">
		<% if $Photo %>
			<div class="stafflist__img">
				<img class="dp-lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="$Photo.FocusFill(350,234).URL" width="350" height="234" alt="Photograph of $FirstName $LastName">
			</div>
		<% else %>
			<div href="$Link" class="stafflist__img">
				<img class="dp-lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="{$ThemeDir}/dist/images/dosl.png" width="350" height="234" alt="Placeholder photo for $FirstName $LastName">
			</div>
		<% end_if %>
		<div class="stafflist__text">
			<p><span class="stafflist__name">$FirstName $LastName</span>
			<% if $Position %><em class="stafflist__position">$Position</em><% end_if %>
			</p>
		</div>
	</a>
</li>
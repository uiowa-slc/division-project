<% with $StartDateTime %>
	<time itemprop="startDate" datetime="$getISOFormat">
		$Format("EEE, MMM d")
	</time>
	at $Format("h:mm a")
<% end_with %>
<% if $EndTime %>
	<% with $EndTime %>
		to $Format("g:ia")
	<% end_with %>
<% end_if %>
<% if $EndDate %>
	until
	<% with $EndDate %>
		<time itemprop="endDate" datetime="$getISOFormat">
			$Format("EEE, MMM d")
		</time>
		 $Format("h:mm a")
	<% end_with %>
<% end_if %>
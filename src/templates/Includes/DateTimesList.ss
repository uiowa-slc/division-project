<% with $StartDateTime %>
	<time itemprop="startDate" datetime="$Format(c)">
		$Format(F) $Format(jS)
	</time>
	at $Format("g:ia")
<% end_with %>
<% if $EndTime %>
	<% with $EndTime %>
		to $Format("g:ia")
	<% end_with %>
<% end_if %>
<% if $EndDate %>
	until
	<% with $EndDate %>
		<time itemprop="endDate" datetime="$Format(c)">
			$Format(F) $Format(j)
		</time>
		 $Format("g:ia")
	<% end_with %>
<% end_if %>
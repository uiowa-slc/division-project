<form $FormAttributes>
	<% if $Message %>
	<p id="{$FormName}_error" class="message $MessageType">$Message</p>
	<% else %>
	<p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
	<% end_if %>
	<fieldset>
		<% loop $Fields %>
		$Me
		<% end_loop %>
		<% loop $Actions %>
		$Field
		<% end_loop %>
	</fieldset>
</form>

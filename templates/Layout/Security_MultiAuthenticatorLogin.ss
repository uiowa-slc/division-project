<div class="row">
<% loop Forms.Limit(2) %>
<div class="large-6 columns" id="{$FormName}">
	<h3>$AuthenticatorName</h3>
	$forTemplate
</div>
<% end_loop %>
</div>
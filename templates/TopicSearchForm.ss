<form $AttributesHTML>
		<div class="topic-search-form__fields">
		<% if $Legend %><legend>$Legend</legend><% end_if %>
		<% loop $Fields %>
			$FieldHolder
		<% end_loop %>
		<% loop $Actions %>
			$Field
		<% end_loop %>
		</div>
</form>
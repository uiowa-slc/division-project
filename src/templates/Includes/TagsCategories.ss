<% if $Categories.exists || $Tags.exists ||$Departments.exists %>
	<div class="tags-categories">
		<% if $Departments.exists %>
			<p>Department:
				<% loop $Departments %>
					<a href="$NewsLink" class="button small hollow secondary">$Title</a><% if not Last %><% else %><% end_if %>
				<% end_loop %>
			</p>
		<% end_if %>

		<% if $Categories.exists %>
			<p>Category:
    			<% loop $Categories %>
    				<a href="$Link" class="button small hollow secondary">$Title</a><% if not Last %><% else %><% end_if %>
    			<% end_loop %>
			</p>
		<% end_if %>

		<% if $Tags.exists %>
			<p>Tagged:
    			<% loop $Tags %>
    				<a href="$Link" class="button small hollow secondary">$Title</a><% if not Last %><% else %><% end_if %>
    			<% end_loop %>
			</p>
		<% end_if %>
	</div>
<% end_if %>

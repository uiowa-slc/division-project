
<div class="faces">
	<% with BlogPage %>
		<a href="$Link">
		    
		    <% if $Image %>
		    	<div class="faces-image-container">
		    		<h3>$Title</h3>
		    		<img data-src="$Image.SetWidth(279).URL" alt="An image representing $Title">
		    	</div>
		    <% end_if %>
		</a>
	<% end_with %>
</div>
	
	<p>$SidebarContent</p>


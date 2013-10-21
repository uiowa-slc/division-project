
<div class="faces">
	<% with BlogPage %>
		<a href="$Link">
		    
		    <% if $Image %>
		    	<div class="faces-image-container">
		    		<h3>$Title</h3>
		    		<img src="$Image.SetWidth(279).URL" alt="$Title - Image">
		    	</div>
		    <% end_if %>
		</a>
	<% end_with %>
</div>
	
	<p>$SidebarContent</p>


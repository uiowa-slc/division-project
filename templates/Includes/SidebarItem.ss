<div class="mod <% if $Image %>photo<% end_if %>">
<% if $ShowHeading %> 
    <div>
    	<% if $Link %>
			<a href="$Link">
				
		        <h3>$Title</h3>
		    
		        <% if $Image %>
		        	<img data-src="$Image.SetWidth(279).URL" alt="An image representing $Title">
		        <% end_if %>
	    	</a>
    	<% else %>
		
	        <h3>$Title</h3>
	        
	        <% if $Image %>
	        	<img data-src="$Image.URL" alt="An image representing $Title">
	        <% end_if %>
    	<% end_if %>
    </div>
<% end_if %>
    $Content
</div>

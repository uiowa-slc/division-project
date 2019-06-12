<section class="content-block__container content-block__container--padding grid-container fluid">
	<% if $ShowTitle %>
        <h2 class="content-block-header--with-padding">$Title</h2>
    <% end_if %>

	<div class="tile-grid">
    	<% if $Source == 'children' %>
        	<% with $Holder %>
        		<% loop $Children %>
        			<a href="$Link" class="tile dp-lazy" data-original="$BackgroundImage.FocusFill(300,300).URL">
        				<div class="tile__text">
                            <h3 class="tile__header">$Title</h3>
                        </div>
        			</a>
        		<% end_loop %>
        	<% end_with %>
    	<% else_if $Source == 'manual' %>
    		<% loop $CustomPages %>
    			<a href="$Link" class="tile dp-lazy" data-original="$BackgroundImage.FocusFill(300,300).URL">
    				<div class="tile__text">
                        <h3 class="tile__header">$Title</h3>
                    </div>
    			</a>
    		<% end_loop %>
    	<% end_if %>
	</div>
</section>



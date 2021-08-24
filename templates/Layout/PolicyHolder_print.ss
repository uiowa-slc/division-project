$Header
<main class="main-content__container" id="main-content__container">

    <div class="row column">

        <article class="main-content main-content--with-padding main-content--full-width">
        	<div class="main-content__header">
                <h1>$Title</h1>
            </div>
            <div class="policy">
	            <% if $PolicyYear %>
		    		<% include PolicyArchiveNav %>
		    	<% end_if %>
                $Content
                $Policies
            </div>
            <hr />
        
				<% loop $PrintablePages %>
					<h2>$Title</h2>
					<% if $Content %>
						$Content
					<% end_if %>
					<% if $CanonicalLink %>
						<p>Please see <a href="$CanonicalLink">$CanonicalLink</a></p>
					<% end_if %>
					<hr />
				<% end_loop %>
		
    </div>


</main>
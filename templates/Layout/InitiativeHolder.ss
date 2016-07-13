<% if $BackgroundImage %>
	<div class="img-container" style="background-image: url($BackgroundImage.URL);">
		<div class="img-fifty-top"></div>
	</div>
<% end_if %>
<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
	    <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
	    <div class="row">
	    	<div class="large-12">
			    	<% if $FeaturedInitiative %>
				    	<% with $FeaturedInitiative %>
				    		<a href="$Link"><img data-src="$MainImage.Fill(700,468).URL" role="presentation" alt="" src="<% include PlaceholderLargeSrc %>" class="initiatives-img" /></a>
				    		<h1><a href="$Link">Featured: $Title</a></h1>
				    		<p> $Content.Summary(100) <a href="$Link"> Continue Reading </a> </p>
				    	<% end_with %>
				    <hr />
			    	<h2>All Initiatives</h2>
			    	<% else %>
			    		<h1>$MenuTitle</h1>
				    <% end_if %>

			    	$Form
			    	$Content
					<ul class="large-block-grid-2 initiatives-list">
					
		                  <% loop $Initiatives %>
		                  <li>
		                              <% if $MainImage %>
		                              <a href="$Link" class="initiatives-link">                                  
		                                    <img data-src="$MainImage.Fill(350,234).URL" role="presentation" alt="" src="<% include PlaceholderLargeSrc %>" class="initiatives-img" />
		                              </a>
		                              <H2> <a href="$Link"> $Title </a> </H2>
		                              <p> $Content.Summary(50) <a href="$Link"> Continue Reading </a> </p>
		                              <% else %>
			                          <a href="$Link" class="initiatives-link no-image"> 
			                             	<p class="NoLogo">$Title</p>  
			                             	<img data-src="{$ThemeDir}/images/no-image-initiative.jpg" role="presentation" alt="" class="initiatives-img"> 			                          	 		 		
			                             </a>
		                              <% end_if %>
		                         
		                    </li>
		                  <% end_loop %>

		            </ul>
		        </section>
		                
			    <section class="sec-content hide-print">
			    	<% include SideNav %>
			    </section>
			</div>
		</div>
	</div>
</div>
<%-- <% include TopicsAndNews %> --%>
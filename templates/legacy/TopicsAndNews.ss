<%-- Override this include in your theme folder with the following code to get started: --%> <%--	<section class="topics hide-print">
  			<div class="container">
  				<div class="colgroup">
  					<div class="col-1-2 mod">
  						<h3 class="mod-title">Topics</h3>
  						<ul class="grid-justify">
	                    	<% with Page("topics") %> <% loop $Entries('8') %> <li><a href="$Link">$MenuTitle</a></li> <% end_loop %> <% end_with %> <div class="col-1-4 mod mod-news"> <% with Page(news) %> <% if $Entries %> <h3 class="mod-title">News</h3><ul class="unstyled"> <% loop $Entries('3') %> <li><a href="$Link">$MenuTitle</a> <% if $Date %><small>$Date.Format('M. j')</small><% end_if %> </li> <% end_loop %> <li><a href="$Link">View all News</a></li></ul> <% end_if %> <% end_with %> </div>--%>
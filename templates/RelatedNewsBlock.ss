<% if $AreaName == "AfterContent" %>
    <% if $RelatedNewsEntries %>
        <section class="content-block__container recentnews" aria-labelledby="Block$ID">
            <div class="content-block row">
                <div class="newsblock">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x">
                            <div class="cell">
                                <h3 class="element-title" id="Block$ID"><% if $Title && $ShowTitle %>$Title<% else %>Recent News<% end_if %></h3>
                            </div>
                            <% loop $RelatedNewsEntries.limit(3) %>
                                <div class="cell medium-4">
                                    <% include BlogCard %>
                                </div>
                            <% end_loop %>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <% end_if %>

    <% else_if $AreaName == "Sidebar" %>
        <section class="content-block__container" aria-labelledby="Block$ID">
        	<div class="content-block row column">
        		<div class="newsblock">
        			<h2 id="Block$ID" class="sidebar-sect-title"><% if $Title && $ShowTitle %>$Title<% else %>Related News<% end_if %></h2>
        			<ul>
        				<% loop $RelatedNewsEntries.limit(3) %>
        					<% include RelatedNewsContent %>
        				<% end_loop %>
        			</ul>
        		</div>
        	</div>
        </section>
    <% else %>

    <section class="content-block__container" aria-labelledby="Block$ID">
    	<div class="content-block row column">
    		<div class="$CSSClasses">
    			<h3 id="Block$ID"><% if $Title && $ShowTitle %>$Title<% else %>Related News<% end_if %></h3>
    			<% loop $RelatedNewsEntries.limit(3) %>
    				<% include BlogCard %>
    			<% end_loop %>
    			<br>
    		</div>
    	</div>
    </section>
<% end_if %>

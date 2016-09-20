<% include BackgroundImage %>
<div class="gradient">
    <div class="container clearfix">
        <div class="white-cover"></div>
        <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
            <article>    

                <% if $FeaturedImage %>
                    <img src="<% include PlaceholderLargeSrc %>" data-src="$FeaturedImage.ScaleWidth(765).URL" role="presentation" alt="">
                <% end_if %>
                     $Breadcrumbs
                	<h1 class="postTitle">$Title</h1>
                <% if $StoryBy %>
                	<p class="authorDate">
						By <% if $StoryByEmail %><a href="mailto:$StoryByEmail">$StoryBy</a><% else %>$StoryBy<% end_if %> <% if $StoryByTitle %> // $StoryByTitle <% end_if %> <% if $StoryByDept %> - $StoryByDept <% end_if %>

                        <% if $PhotosBy %>
                            <br />

                            <% if $PhotosByEmail %>
                                <a href="mailto:$PhotosByEmail">$PhotosByEmail</a>

                            <% else %>
                                Photo(s) by $PhotosBy
                            <% end_if %>

                        <% end_if %>


                	</p>
			    <% end_if %>
                	                	
	                $Content  
                
                    <% if Tags %>
                    <hr />
                    <p class="tags">
                         <% _t('TAGS', 'Tags:') %> 
                        <% loop Tags %>
                            <a href="$Link" title="<% _t('VIEWALLPOSTTAGGED', 'View all posts tagged') %> '$Title'" rel="tag">$Title</a><% if not Last %>,<% end_if %>
                        <% end_loop %>
                    </p>
                <% end_if %>      
            
            </article>
        </section>
        
        <section class="sec-content hide-print">
            <%-- include SideNav --%>


            <% include BlogSideBar %>
            <% include BlogEntrySideNews %>
        </section>
    </div>
</div>

<%-- <% include TopicsAndNews %> --%>
    



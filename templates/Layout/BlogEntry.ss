<% if $BackgroundImage %>
    <div class="img-container" style="background-image: url($BackgroundImage.URL);">
        <div class="img-fifty-top"></div>
    </div>
<% end_if %>
<div class="gradient">
    <div class="container clearfix">
        <div class="white-cover"></div>
        <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
            <article>    
                <% if $Image %>
                    <img src="$Image.CroppedImage(765,512).URL" alt="">
                <% end_if %>
                	<h1 class="postTitle">$Title</h1>
                <% if $StoryBy %>
                	<p>
						Story by <a href="mailto:$StoryByEmail">$StoryBy</a> <% if $StoryByTitle %> // $StoryByTitle <% end_if %> <% if $StoryByDept %> - $StoryByDept <% end_if %>
                	</p>
			    <% end_if %>
                	                	
	                $Content  
                
                    <% if TagsCollection %>
                    <br />
                    <p class="tags">
                         <% _t('TAGS', 'Tags:') %> 
                        <% loop TagsCollection %>
                            <a href="$Link" title="<% _t('VIEWALLPOSTTAGGED', 'View all posts tagged') %> '$Tag'" rel="tag">$Tag</a><% if not Last %>,<% end_if %>
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
    



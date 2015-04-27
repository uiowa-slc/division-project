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
                $Breadcrumbs
                <% if $Image %>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAvgAAAH7CAMAAACOgBviAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCOTEyNzJEQkM5OUQxMUU0OTYyNEQ4OUE1MDYwNzQwNCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCOTEyNzJEQ0M5OUQxMUU0OTYyNEQ4OUE1MDYwNzQwNCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkI5MTI3MkQ5Qzk5RDExRTQ5NjI0RDg5QTUwNjA3NDA0IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkI5MTI3MkRBQzk5RDExRTQ5NjI0RDg5QTUwNjA3NDA0Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+Odnm4wAAADBQTFRF9fX15ubm9PT05+fn8/Pz6Ojo8vLy6enp8fHx6urq8PDw6+vr7+/v7Ozs7u7u7e3tzZ1GFwAADZ5JREFUeNrs3e12orcBRlFqbGf8Adz/3eZH05SmbYzxC0g6W7cwe2mJ53hg9w/H+ffZf3Vevj6/fXnevjgfX57Dl+f092fn39q5WP0l7n+sfhP3pxP4zmbuX+7h/h7sT0fwnd51fzqC74DvcH9b9hu4P2zCHnxns+v+Huw3cw++M8yIeZfr/vjHAd8Z5JXz8XFH9+A7g1z39/lMC75T3HLAdzZ75Yzh/nvswcd+huv+cNjaPfjgg+9wP2Kz+tiePfjYd5oV+M48I+YG7o//64CPfaVZgc99/LoHn/pQswKf+yWa1eF69uBjn9pywAcffIf7+ZrVD92Dj33wugef+zVHzK/Yg499p1mdn0/wse9d98dP8LHPNKsz9uBzv1izutA9+OCD73jnLD5i/qEefO5DzercPfiu+2XYHy9nD37dfWzEBB/7XrP6BB/7ua770+buwfe470yY4HNfnO7BBx988L1zMts9+K77unvwXfelERP8sPuXF+7B98pJsgcf+9SWA77HfZo9+OCD73jnZNyD77rvbPfgu+7r7t/Bxz40Yv7pHvyEe83qL+zB57543YPvldPacv5QDz73LfZ/ugcffPAd75yZ3X+DPfh196Xt/tw9+F45mWb1Dr4Rc7ER89vuwdesMs0KfO6X+o60a9yDb8vJNCvwwQcffGvO1OyvdA++6740YoKvWS3A/gfuwffKCV734BsxQ80KfM0q2azAd92vv+V84R58W05mugcffPDBt+ZUmhX42FdHzH+dX7/A16wqzercPfhGzOB1D74RM9SsztiD77rvNKsz9uDbclJbzi/wTfe56f6MPfjgg+9450TeOeBrVq0RE3zNqteswDdiDuP+QezB16w6zQp8132yWYFvy6luOeCDD74zD3s/7LMNe/Bd96OOmLd1D/5S171mdSF78DWrTrMC33W//oj59+zB16w6zQr84odazQp8W05zuj8/r+CDD76jWQ3erLZ557y+gm/EzDSrc/fgGzHnaVabXPev/zzgu+4rzercPfhGzElGzM+tHjnga1atZnXuHvyFtxzX/f9lDz744Dua1dLNCnzNKtmswDdi1kbM/3IPvmaVaVbgu+7XGTGvdA++ZlXacsDXrHrNCnzT/QRb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" data-src="$Image.SetWidth(765).URL" alt="Image representing $Title">
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
                Posted on $Date.Format("F j, Y")
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
    



<aside>
                <div class="mod">
                    
                        <a href="http://vp.studentlife.uiowa.edu/news/">
                            
                            <h3>More News</h3>
                        
                            
                        </a>
                    
             
               
                <ul class="feed-nav">
                    <% with Page('news') %>
                        <% if $Entries %>
                            <% loop $Entries(3) %>
                                <a href="$Link" title="<% _t('VIEWFULL', 'View full post titled -') %> '$Title'"><li>$MenuTitle<br /><span class="posted-on">posted on $Date.Format('F n')</span><!--<span class="read-more"> More</span><div class="clearfix"></div>--></li></a>
                            <% end_loop %>
                        <% end_if %>
                    <% end_with %>
                    <li><a href="news/">View all news</a></li>
                </ul>
            </div>
          </aside>
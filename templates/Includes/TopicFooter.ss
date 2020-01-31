<% if $FeaturedTopics %> <div style="background: #f6f6f6;"><div class="grid-container"><div class="grid-x grid-padding-x"><div class="cell"><h2 style="text-transform: uppercase; font-size: 1em; color: #333;">Featured Topics</h2></div></div><div class="grid-x grid-padding-x small-up-2 medium-up-4"> <% loop $FeaturedTopics.Sort('FeaturedSortOrder') %> <div class="cell"><h2 style="font-size: 28px;"><a href="$Link">$Title.LimitCharacters(60)</a></h2><p style="font-size: 12px;">Last Edited: $LastEdited.Format("MMMM d, YYYY")</p></div> <% end_loop %> </div></div></div> <% end_if %> <div class="grid-container"> <% if $AllCats %> <div class="grid-x grid-padding-x"><div class="cell"><h2 style="text-transform: uppercase; font-size: 1em; color: #333;">Categories</h2></div></div><div class="grid-x grid-padding-x small-up-2 medium-up-4 large-up-6" data-equalizer> <% loop $AllCats.Sort('Title ASC') %> <div class="cell margin-bottom-2" data-equalizer-watch><a href="$Link" class="button large hollow secondary" style="display: flex; height: 100%; border-radius: 3px;"><span style="display: block; margin: auto;">$Title</span></a></div> <% end_loop %> </div> <% end_if %> <% if $AllTags %> <div class="grid-x grid-padding-x"><div class="cell"><h2 style="text-transform: uppercase; font-size: 1em; color: #333;">Tags</h2></div></div><div class="grid-x grid-padding-x small-up-2 medium-up-4 large-up-6" data-equalizer> <% loop $AllTags.Sort('Title ASC') %> <div class="cell margin-bottom-2" data-equalizer-watch><a href="$Link" class="button large hollow secondary" style="display: flex; height: 100%;"><span style="display: block; margin: auto;">$Title</span></a></div> <% end_loop %> </div> <% end_if %> </div><div style="background: #f6f6f6;"><div class="grid-container"><div class="grid-x grid-padding-x"><div class="cell"><h2 style="text-transform: uppercase; font-size: 1em; color: #333;">Recently Updated Topics</h2></div></div><div class="grid-x grid-padding-x small-up-2 medium-up-4"> <% loop $BlogPosts.Limit(8).Sort('LastEdited DESC') %> <div class="cell"><h2 style="font-size: 24px;"><a href="$Link">$Title</a></h2><p style="font-size: 14px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">$Content.LimitCharacters(40).ATT</p><p style="font-size: 12px;">Last Edited: $LastEdited.Format("MMMM d, YYYY")</p></div> <% end_loop %> </div></div></div> <% if $AllCats.Count > 4 %> <div style="background: #eee;"><div class="grid-container"><div class="grid-x grid-padding-x"><div class="cell"><h2>All topics by category</h2><ul style="margin-left: 0; column-count: 3;"> <% loop $AllCats.Sort('Title ASC') %> <li class="topic-list__item"><h3 tyle="font-weight: 400; font-size: 20px; margin-bottom: 5px; margin-top: 0;">$Title</h3></li> <% if $BlogPosts %> <ul style="margin-left: 0;"> <% loop $BlogPosts %> <li style="list-style-type: none; margin-bottom: 10px;"><h3 style="font-weight: normal; font-size: 17px;  margin-top: 0;"><a style="color: #666; text-decoration: underline;" href="$Link">$Title</a></h3></li> <% end_loop %> </ul> <% end_if %> <% end_loop %> <%--                   <% loop $BlogPosts.Sort('Title ASC') %> <li style="list-style-type: none;"><h3 style="font-size: 17px; margin-bottom: 5px; margin-top: 0;"><a style="color: #666;" href="$Link">$Title</a></h3></li> <% end_loop %> --%></ul></div></div></div></div> <% else_if $AllTags.Count > 4 %> <div style="background: #eee;"><div class="grid-container"><div class="grid-x grid-padding-x"><div class="cell"><h2>All topics by tag</h2><ul style="margin-left: 0; column-count: 3;"> <% loop $AllTags.Sort('Title ASC') %> <li class="topic-list__item"><h3 tyle="font-weight: 400; font-size: 20px; margin-bottom: 10px; margin-top: 0;">$Title</h3></li> <% loop $BlogPosts %> <li style="list-style-type: none;"><h3 style="font-weight: normal; font-size: 17px; margin-bottom: 5px; margin-top: 0;"><a style="color: #666;" href="$Link">$Title</a></h3></li> <% end_loop %> <% end_loop %> <%--                   <% loop $BlogPosts.Sort('Title ASC') %> <li style="list-style-type: none;"><h3 style="font-size: 17px; margin-bottom: 5px; margin-top: 0;"><a style="color: #666;" href="$Link">$Title</a></h3></li> <% end_loop %> --%></ul></div></div></div></div> <% else %> <div style="background: #eee;"><div class="grid-container"><div class="grid-x grid-padding-x"><div class="cell"><h2>All topics (alphabetical)</h2><ul style="margin-left: 0; column-count: 3;"> <% loop $TopicsByLetter %> <li class="topic-list__item"><h3 tyle="font-weight: 400; font-size: 20px; margin-bottom: 5px; margin-top: 0;">$Letter</h3></li> <% loop $Topics %> <li style="list-style-type: none;"><h3 style="font-weight: normal; font-size: 17px; margin-bottom: 5px; margin-top: 0;"><a style="color: #666;" href="$Link">$Title</a></h3></li> <% end_loop %> <% end_loop %> </ul></div></div></div></div> <% end_if %>
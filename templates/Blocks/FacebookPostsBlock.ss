<%--         'FBID' => 'Varchar(100)',
        'Content' => 'Text',
        'ImageSource' => 'Varchar(255)',
        'URL' => 'Varchar(255)',
        'TimePosted' => 'SS_Datetime' // The time it was posted to the Page Timeline --%> <section class="content-block__container"><div class="content-block row column"><div class="newsblock"><h2 class="newsblock__header"><% if $Title %>$Title<% else %>Latest Posts<% end_if %></h2> <% loop $Entries.limit(3) %> <% include FbPostCard %> <% end_loop %> <br></div></div></section>
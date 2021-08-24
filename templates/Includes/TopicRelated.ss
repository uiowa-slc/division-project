<% if $RelatedNewsEntries %>
	<% if $TermPlural %>
		<h2 class="topic-related-header">Related {$TermPlural.Lowercase}:</h2>
	<% else %>
		<h2 class="topic-related-header">Related:</h2>
	<% end_if %>
  <% loop $RelatedNewsEntries %>
      <div style="max-width: 800px;">
        <% include TopicCard %>
      </div>
  <% end_loop %>
<% end_if %>
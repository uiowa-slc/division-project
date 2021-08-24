<article class="topic-content">

  <% if $Content %>

    <div class="main-content__text">
    $Content
    </div>

    <% if $TermPlural %>
       <h2 class="topic-related-header" style="margin-bottom: 0;">{$TermPlural} listed under &ldquo;{$Title}&rdquo;:</h2>
    <% else %>
      <h2 class="topic-related-header" style="margin-bottom: 0;">Listed under &ldquo;{$Title}&rdquo;:</h2>
    <% end_if %>

  <% end_if %>

  <% if $BlogPosts %>
    <% loop $BlogPosts.Sort('LastEdited') %>
        <% include TopicCard %>
    <% end_loop %>
  <% else %>
      <p style="margin-top: 20px;">Nothing is currently listed under this category.</p>
  <% end_if %>
<%--     <% if $ContentAfter %>
   <hr />
    <div class="main-content__text">
        $ContentAfter
    </div>
<% end_if %> --%>
  <% with $Blog %>
    <% include TopicFeedback %>
  <% end_with %>
</article>

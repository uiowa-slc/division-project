$Header
<main class="main-content__container" id="main-content__container">

<%--   <% include FeaturedImage %> --%>
<% with $BackgroundImage %>
<div class="background-image" data-interchange="[$FocusFill(600,400).URL, small], [$FocusFill(1600,500).URL, medium]" style="background-position: {$PercentageX}% {$PercentageY}%;  display: flex;
align-items: center;">
<% end_with %>
    <div style="width: 100%;">
      <div style="max-width: 700px; margin: auto; text-align: center; z-index:999; position: relative;">
        <h1 class="background-image__title" style="margin-bottom: 20px;"><a href="$Link" style="color: white;">$Title</a></h1>
        $TopicSearchForm
      </div>
    </div>
</div>


$BeforeContent

<div class="grid-container">
  <div class="grid-x grid-padding-x">
    <article class="cell">
      $BeforeContentConstrained

<%--       <div class="main-content__text">
        $Content
      </div> --%>
<% if $CurrentCategory || $CurrentTag %>
      <% if $CurrentCategory %>
        <% with $CurrentCategory %>
<%--           $Content --%>
          <% if $BlogPosts %>

              <h2 style="text-transform: uppercase; color: #333; border-bottom: 2px solid #333;">Listed under {$Title}:</h2>

                <% loop $BlogPosts.Sort('LastEdited') %>
                  <div style="max-width: 800px; margin:auto;">
                    <% include TopicCard %>
                  </div>
                <% end_loop %>
       
            <% else %>
              <p>No topics are currently listed.</p>
          <% end_if %>           
        <% end_with %>
      <% else_if $CurrentTag %>
        <% with $CurrentTag %>

            <h2 style="text-transform: uppercase; color: #333; border-bottom: 2px solid #333;">Listed under {$Title}:</h2>

            <% if $BlogPosts %>

                <% loop $BlogPosts.Sort('LastEdited') %>
                  <div style="max-width: 800px; margin:auto;">
                    <% include TopicCard %>
                  </div>
                <% end_loop %>
       
            <% else %>
              <p>No topics are currently listed.</p>
          <% end_if %><%-- /endif BlogPosts --%>
        <% end_with %><%-- /endwith CurrentTag --%>
      <% end_if %><%-- /endif CurrentTag --%>

        <div class="grid-x large-up-2" style="margin-top: 200px; border-top: 1px solid #eee; padding-top: 120px;">
          <div class="cell">
            <h2 style="margin-top: 0; margin-bottom: 0;">More topics:</h2>
        </div>
        <div class="cell">
            $TopicSearchForm
        </div>
      </div>
  
<% end_if %><%-- /endif CurrentCategory || CurrentTag --%>

    </article>
  </div>
</div>

<% include TopicFooter %>


    $AfterContentConstrained
    $Form



$AfterContent

</main>

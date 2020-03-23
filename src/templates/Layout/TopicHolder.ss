$Header
<main class="main-content__container" id="main-content__container">


<% if $Action == "index" %>
<%--   <% include FeaturedImage %> --%>
<% with $BackgroundImage %>
<div class="background-image" data-interchange="[$FocusFill(600,400).URL, small], [$FocusFill(1600,500).URL, medium]" style="background-position: {$PercentageX}% {$PercentageY}%;  display: flex;
align-items: center;">
<% end_with %>
    <div style="width: 100%;">
      <div style="max-width: 700px; margin: auto; text-align: center; z-index:1; position: relative;">
        <h1 class="background-image__title" style="margin-bottom: 20px;"><a href="$Link" style="color: white;">$Title</a></h1>
        $TopicSearchForm
      </div>
    </div>
</div>

<% else_if $CurrentCategory || $CurrentTag %>
   $Breadcrumbs
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="cell">
        <div class="main-content__header">

        <% if $CurrentCategory.Content || $CurrentTag.Content %>
          <% if $CurrentCategory %>
            <h1>$CurrentCategory.Title</h1>
          <% else_if $CurrentTag %>
            <h1>$CurrentTag.Title</h1>
          <% end_if %>
        <% else %>
          <% if $CurrentCategory %>
            <% if $TermPlural %>
              <h1>{$TermPlural} listed under "{$CurrentCategory.Title}": </h1>
            <% else %>
              <h1>Listed under: $CurrentCategory.Title</h1>
            <% end_if %>
            
          <% else_if $CurrentTag %>
            <% if $TermPlural %>
              <h1>{$TermPlural} listed under "{$CurrentTag.Title}": </h1>
            <% else %>
              <h1>Listed under: $CurrentTag.Title</h1>
            <% end_if %>
          <% end_if %>
        <% end_if %>
        </div>
      </div>
    </div>
  </div>

<% end_if %>

$BeforeContent
 
<div class="grid-container">

  <div class="grid-x grid-padding-x">
    <article class="cell">

      $BeforeContentConstrained

<% if not $CurrentCategory && not $CurrentTag && $Content %>
      <div class="main-content__text" style="padding-top: 20px; margin: auto; max-width: 800px;">
        $Content
      </div>
<% end_if %>
<% if $CurrentCategory || $CurrentTag %>

      <% if $CurrentCategory %>
        <% with $CurrentCategory %>
          <% if $Content %>
          <article style="max-width: 800px; margin: auto;">
            <div class="main-content__text" style="padding-top: 20px; margin: auto; max-width: 800px;">
            $Content 
            </div>
          </article>
     
              <% if $Up.TermPlural %>
                 <h2 style="margin-bottom: 0;">{$Up.TermPlural} listed under "{$Title}":</h2>
              <% else %>
                <h2 style="margin-bottom: 0;">Listed under {$Title}:</h2>
              <% end_if %>
       
          <% end_if %>

          <% if $BlogPosts %>
                <% loop $BlogPosts.Sort('LastEdited') %>
                    <% include TopicCard %>
                <% end_loop %>
       
            <% else %>
              <p style="margin-top: 20px;">Nothing is currently listed under this category.</p>
          <% end_if %>           
        <% end_with %>
      <% else_if $CurrentTag %>
        <% with $CurrentTag %>
        <% if $Content %>
          <article style="max-width: 800px; margin: auto;">
            $Content 
          </article>
            <div class="main-content__header">
              <% if $Up.TermPlural %>
                 <h2 style="margin-bottom: 0;">{$Up.TermPlural} listed under "{$Title}":</h2>
              <% else %>
                <h2 style="margin-bottom: 0;">Listed under {$Title}:</h2>
              <% end_if %>
            </div>      
          <% end_if %>

          <% if $BlogPosts %>
                <% loop $BlogPosts.Sort('LastEdited') %>
                    <% include TopicCard %>
                <% end_loop %>
       
            <% else %>
              <p style="margin-top: 20px;">Nothing is currently listed under this category.</p>
          <% end_if %>       
        <% end_with %><%-- /endwith CurrentTag --%>
      <% end_if %><%-- /endif CurrentTag --%>

        <div class="grid-x large-up-2" style="margin-top: 200px; border-top: 1px solid #eee; padding-top: 120px;">
          <div class="cell">
            <% if $TermPlural %>
              <h2 style="margin-top: 0; margin-bottom: 0;">More {$TermPlural}:</h2>
            <% else %>
              <h2 style="margin-top: 0; margin-bottom: 0;">More:</h2>
            <% end_if %>
            
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

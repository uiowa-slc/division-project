$Header
<main class="main-content__container" id="main-content__container">


<% if $Action == "index" %>
<%--   <% include FeaturedImage %> --%>
<% with $BackgroundImage %>
<div  data-interchange="[$FocusFill(600,400).URL, small], [$FocusFill(1600,500).URL, medium]">
<% end_with %>
<div class="background-image" style="background-position: {$PercentageX}% {$PercentageY}%;  display: flex;
align-items: center; background: rgba(0,0,0,0.4);">
<div style="width: 100%;">
    <div style="width: 100%;">
      <div style="max-width: 700px; margin: auto; text-align: center; z-index:1; position: relative;">
        <h1 class="background-image__title" style="margin-bottom: 20px;"><a href="$Link" style="color: white;">$Title</a></h1>
        $TopicSearchForm
      </div>
    </div>
</div>
</div>
</div>
<% else_if $CurrentCategory || $CurrentTag %>
   $Breadcrumbs
  <div class="grid-container">
    <div class="grid-x align-center grid-padding-x">
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
              <h1>{$TermPlural} listed under {$CurrentCategory.Title}: </h1>
            <% else %>
              <h1>Listed under: $CurrentCategory.Title</h1>
            <% end_if %>
            
          <% else_if $CurrentTag %>
            <% if $TermPlural %>
              <h1>{$TermPlural} listed under {$CurrentTag.Title}: </h1>
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
    <div class="cell small-12 large-1 show-for-medium"></div>
    <article class="cell medium-8 large-6">

      $BeforeContentConstrained

      <% if not $CurrentCategory && not $CurrentTag && $Content %>
            <div class="topic-content main-content__text">
              $Content

              <% include TopicFeedback %>
            </div>

      <% end_if %>
      <% if $CurrentCategory || $CurrentTag %>
            <% if $CurrentCategory %>
              <% with $CurrentCategory %>
                <% include TopicFilterContent %>      
              <% end_with %>
            <% else_if $CurrentTag %>
              <% with $CurrentTag %>
                  <% include TopicFilterContent %>
              <% end_with %><%-- /endwith CurrentTag --%>
            <% end_if %><%-- /endif CurrentTag --%>


           


      <% end_if %><%-- /endif CurrentCategory || CurrentTag --%>

    </article>
      <div class="cell small-12 large-1 show-for-large">

      </div>
    
      <div class="cell medium-4">
        <div class="dp-sticky">
        <% include TopicBrowseByFilter %>
      </div>
    </div>


  </div>
</div>


  
  <% include TopicBrowseAll %>
  <% include TopicFooter %>

    $AfterContentConstrained
    $Form



$AfterContent

</main>

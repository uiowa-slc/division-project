<!doctype html>
<html lang="en" class="no-js">
  <head>
    $GlobalAnalytics
    <% base_tag %>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    $MetaTags(false)
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <% if $URLSegment = 'home' %>
      <title>$SiteConfig.Title | The University of Iowa</title>
    <% else %>
      <title>$Title - $SiteConfig.Title | The University of Iowa</title>
    <% end_if %>
    $OpenGraph
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <% include Favicons %>

    <% if $PreventSearchEngineIndex %>
        <meta name="robots" content="noindex">
    <% end_if %>

    {$GoogleFonts}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>

    <% require css("themes/division-subtheme/dist/css/main.css") %>
  </head>
<body class="{$ClassName} {$ClassAncestry} body--{$DarkLightHeader} action--{$Action} <% if $DarkMode %>body--darkmode<% end_if %>">

    $Layout

    <% include Footer %>

    $BetterNavigator

   <% require javascript("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ) %>
   <% require javascript("themes/division-subtheme/dist/scripts/app.js") %>
    $Analytics
  </body>
</html>

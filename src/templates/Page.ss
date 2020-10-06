<!doctype html>
<html lang="en" class="no-js">
  <head>
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

    <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/49191f9021.js" crossorigin="anonymous"></script>

    <% require css("themes/division-subtheme/dist/css/main.css") %>
  </head>
<body class="{$ClassName} {$ClassAncestry} body--{$DarkLightHeader} action--{$Action} <% if $DarkMode %>body--darkmode<% end_if %>">

    $Layout

    <% include Footer %>

    $BetterNavigator

   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{$ThemeDir}/dist/scripts/app.js"></script>

    $Analytics
  </body>
</html>

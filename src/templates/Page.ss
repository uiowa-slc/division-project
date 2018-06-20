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
<%--     $OpenGraph --%>
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Web Application Manifest -->
    <link rel="manifest" href="vendor/md/division-project/src/favicons/manifest.json">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="$SiteConfig.Title">
    
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="$SiteConfig.Title">
    <link rel="apple-touch-icon" sizes="180x180" href="vendor/md/division-project/src/favicons/apple-touch-icon.png?v=2">
    <link rel="icon" type="image/png" href="vendor/md/division-project/src/favicons/favicon-32x32.png?v=2" sizes="32x32">
    <link rel="icon" type="image/png" href="vendor/md/division-project/src/favicons/favicon-16x16.png?v=2" sizes="16x16">
    <link rel="icon" type="image/png" href="vendor/md/division-project/src/favicons/favicon-192x192.png?v=2" sizes="192x192">

    <link rel="manifest" href="vendor/md/division-project/src/favicons/manifest.json">
    <link rel="mask-icon" href="vendor/md/division-project/src/favicons/safari-pinned-tab.svg" color="#000000">
    <link rel="shortcut icon" href="vendor/md/division-project/src/favicons/favicon.ico">
    <meta name="msapplication-config" content="vendor/md/division-project/src/favicons/browserconfig.xml">
    <meta name="theme-color" content="#000000">

    <% if $PreventSearchEngineIndex %>
      <meta name="robots" content="noindex">
    <% end_if %>

    $TypeKitScript
    <link rel="stylesheet" href="{$ThemeDir}/dist/css/main.css">
  </head>
  <body class="{$ClassName} {$ClassAncestry} body--{$DarkLight} action--{$Action}">
    <a class="skip-link" href="#main-content__container">Skip to Main Content</a>
    <!-- Add your site or app content here -->
    <% if $SiteConfig.ShowExitButton %>
    <a class="exit-button" href="http://weather.com"><span class="show-for-sr">Exit this website now</span></a>
    <% end_if %>
      $Layout



    <% include Footer %>
    $BetterNavigator
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="{$ThemeDir}/dist/scripts/app.js"></script>

    $Analytics
  </body>
</html>
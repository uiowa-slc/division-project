<!doctype html>
<html lang="en" class="no-js" style="height:100%;">
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

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Web Application Manifest -->
    <link rel="manifest" href="vendor/md/division-project/src/favicons/manifest.json">

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

    <!-- noindex -->
    <meta name="robots" content="noindex">

    {$GoogleFonts}
    <link rel="stylesheet" href="{$ThemeDir}/dist/css/main.css">

    <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/49191f9021.js" crossorigin="anonymous"></script>

</head>

<body>

    $Header

    <div class="grid-container" id="main-content__container">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <div class=" margin-top-3 margin-bottom-3 text-center">
                    <h1>Continue to log in with your HawkID.</h1>
                    $Content
                    $Form
                    <%-- <img src="{$ThemeDir}/dist/images/uiowa--light.png" alt="university of iowa logo" class="sslogin__uilogo"> --%>
                    <img loading="lazy" width="150" src="{$ThemeDir}/dist/images/dosl-stacked.png" alt="Division Of Student Life" class="margin-top-3 margin-bottom-3">
                </div>
            </div>
        </div>
    </div>

    <% include Footer %>

</body>
</html>

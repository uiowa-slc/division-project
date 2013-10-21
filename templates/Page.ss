<!DOCTYPE html>
<!--[if IE 9]><html class="ie9" lang="en"> <![endif]-->
<!--[if IE 8]><html class="ie8" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
		<!-- deployment test -->
	<% base_tag %>
	<meta charset="utf-8">
	
	<meta name="description" content="" /> 
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="{$ThemeDir}/images/favicon.ico" />
	
	<title>$Title - Vice President For Student Life</title>
	<link rel="stylesheet" href="{$ThemeDir}/css/master.css" />
	<link rel="stylesheet" href="{$BaseHref}/division-bar/css/_division-bar.css" />
	<!--[if lt IE 9]>
		<script src="{$ThemeDir}/js/vendor/html5shiv.js"></script>
		<script src="{$ThemeDir}/js/vendor/respond.min.js"></script>

	<![endif]-->
	<script type="text/javascript" src="//use.typekit.net/xwj3fgc.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>

<body>
    <% include DivisionBar %>

    <% include Header %>
    $Layout

    <% include Footer %>

	<!-- Scripts -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{$ThemeDir}/js/vendor/jquery-1.8.3.min.js">\x3C/script>')</script>
	<script src="{$ThemeDir}/js/plugins-ck.js"></script>
	<script src="{$ThemeDir}/js/main-ck.js"></script>
	<script type="text/javascript" src="{$BaseHref}division-bar/js/division-bar.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-426753-52', 'uiowa.edu');
  ga('send', 'pageview');
</script>
</body>
</html>
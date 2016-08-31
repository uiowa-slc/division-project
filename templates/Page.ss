<!DOCTYPE html>
<!--[if IE 9]><html class="ie9" lang="en"> <![endif]-->
<!--[if IE 8]><html class="ie8" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<% base_tag %>
	<meta charset="utf-8">
	
	<meta name="description" content="" /> 
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

	<% include OpenGraph %>

	<% if $PreventSearchEngineIndex %>
		<meta name="robots" content="noindex">
	<% end_if %>

	<link rel="shortcut icon" href="division-project/images/favicon.ico" />

	<% if $URLSegment = 'home' %>
		<title>$SiteConfig.Title - The University of Iowa</title>
	<% else %>
		<title>$Title - $SiteConfig.Title - The University of Iowa</title>
	<% end_if %>
<style><% include CriticalCss %></style>
	
	<% include LoadCss %>
	<script>
	  loadCSS( "$ThemeDir/css/master.css" );
	</script>
	<noscript><link href="$ThemeDir/css/master.css" rel="stylesheet"></noscript>
	<!--[if lt IE 9]>
	  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
	  <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
	  <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
	  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
	<![endif]-->
	<% include GoogleAnalytics %>
</head>

<body class="{$ClassName} loading">

<div id="skiplink" role="region" aria-label="Skip Link">
	<a href="#main" class="visuallyhidden">Skip to main content</a>
</div>

<div id="fb-root" role="navigation" aria-label="Social Media"></div>

	<% if $SiteConfig.DisableDivisionBranding %>
		<% include UiowaBarBootstrap %>
	<% else %>
    	<% include DivisionBar %>
    <% end_if %>

    <% include Header %>
    <div id="main" role="main"; aria-label="Main Page Content">
    	$Layout
    </div>
    <% if $SiteConfig.ShowExitButton %>
    <a id="exit" href="http://weather.com"></a>
    <% end_if %>
    <% include SubFooter %>
    <% include Footer %>
    <% include MdBar %>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
	function downloadJSAtOnload() {
	var element = document.createElement("script");
	element.src = "$ThemeDir/build/build.js";
	document.body.appendChild(element);
	}
	if (window.addEventListener)
	window.addEventListener("load", downloadJSAtOnload, false);
	else if (window.attachEvent)
	window.attachEvent("onload", downloadJSAtOnload);
	else window.onload = downloadJSAtOnload;
	</script>
	
	<script type="text/javascript">
	(function(d) {
	  var tkTimeout=3000;
	  if(window.sessionStorage){if(sessionStorage.getItem('useTypekit')==='false'){tkTimeout=0;}}
	  var config = {
	    kitId: 'ivn3muh',
	    scriptTimeout: tkTimeout
	  },
	  h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+"wf-inactive";if(window.sessionStorage){sessionStorage.setItem("useTypekit","false")}},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+="wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	})(document);
	</script>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=270867676312194&version=v2.4";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	$BetterNavigator
</body>
</html>
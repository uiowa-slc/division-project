<section class="content-block__container"><div class="content-block row column"> <% if $TwitterUserTimelineURL %> <a class="twitter-timeline" data-height="600" href="$TwitterUserTimelineURL">Tweets by uiowaIMU</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> <% end_if %> <% if $FacebookPageUrl %> <div id="fb-root"></div><script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=142327899218761";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script><div class="fb-page" data-href="$FacebookPageUrl" data-tabs="$Tabs" <% if $FacebookPluginHeader %> data-small-header="true" <% else %> data-small-header="false" <% end_if %> data-adapt-container-width="true" <% if $FacebookPluginCover %> data-hide-cover="true" <% else %> data-hide-cover="false" <% end_if %> data-width="500" <% if $FacebookPluginFaces %> data-show-facepile="true" <% else %> data-show-facepile="false" <% end_if %>></div> <% end_if %> </div></section>
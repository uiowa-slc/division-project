<section class="content-block__container">
	<div class="content-block row column">
		<div class="">
			<div class="$CSSClasses">
				<% if $TwitterUserTimelineURL %>
					<a class="twitter-timeline" data-height="600" href="$TwitterUserTimelineURL">Tweets by uiowaIMU</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				<% end_if %>
				<% if $FacebookPageUrl %>
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=142327899218761";
					fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					<div class="fb-page" data-href="$FacebookPageUrl" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
				<% end_if %>
			</div>
		</div>
	</div>
</section>
$Header<main class="main-content__container" id="main-content__container"><div class="background-image"><div class="video-background"><div class="video-foreground"><div id="muteYouTubeVideoPlayer"></div><script async src="https://www.youtube.com/iframe_api"></script><script>function onYouTubeIframeAPIReady() {
						var player;
						player = new YT.Player('muteYouTubeVideoPlayer', {
							videoId: '$YoutubeBackgroundEmbed', // YouTube Video ID
							width: 560,               // Player width (in px)
							height: 316,              // Player height (in px)
							playerVars: {
								autoplay: 1,        // Auto-play the video on load
								controls: 0,        // Show pause/play buttons in player
								showinfo: 0,        // Hide the video title
								modestbranding: 0,  // Hide the Youtube Logo
								loop: 0,            // Run the video in a loop
								fs: 0,              // Hide the full screen button
								cc_load_policy: 0, // Hide closed captions
								iv_load_policy: 3,  // Hide the Video Annotations
								autohide: 0         // Hide video controls when playing
							},
							events: {
								onReady: function(e) {
									e.target.mute();
								}
							}
						});
					}</script></div></div><div class="column row"><div class="background-image__header"><h1 class="background-image__title">$Title</h1> <% if ClassName == 'BlogPost' %><% include ByLine %><% end_if %> </div></div></div>$Breadcrumbs $EmbedCode <% include MainContentBody %> </main>
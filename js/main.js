$(window).load(function() {
	// add js class to body if javascript enabled
    //$('body').addClass('js');

	// Flexslider
	// $('.flexslider').flexslider({
	// 	slideshow: false
	// });

	$('.nav-title a').click(function() {
		$('.nav-main-wrapper').toggleClass('expand');
		return false;
	})

	/* FitVids */
	$(".module .media").fitVids();

});

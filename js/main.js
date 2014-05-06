$(window).load(function() {
	// add js class to body if javascript enabled
    //$('body').addClass('js');

	// Flexslider
	// $('.flexslider').flexslider({
	// 	slideshow: false
	// });
	
	if ($('.flexslider').length){

		$('.flexslider').show();

		 //Flexslider
		$('.flexslider').flexslider({
			animation: "slide",
			animationLoop: true,
			itemMargin: 0,
			minItems: 1,
			maxItems: 1,
			itemWidth: 500,
		});
	}

	$('.nav-title a').click(function() {
		$('.nav-main-wrapper').toggleClass('expand');
		return false;
	})

	/* FitVids */
	$(".module .media").fitVids();

});
   
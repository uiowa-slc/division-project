$(function() {

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
			start: function(){
				bLazy.revalidate();
			},
			before: function(){
				bLazy.revalidate();
			},
		});
	}

	$('.nav-title a').click(function() {
		$('.nav-main-wrapper').toggleClass('expand');
		return false;
	});

	/* FitVids */
	$(".module .media").fitVids();
	$(".hero-content").fitVids();

	var bLazy = new Blazy({
		selector: 'img,.lazy',
	    breakpoints: [{
	        width: 420, //max-width
	        src: 'data-src-small'
	    }, {
	        width: 768, // max-width
	        src: 'data-src-medium'
	    }
	   ]
	});

	$("body").removeClass("loading");
	
});
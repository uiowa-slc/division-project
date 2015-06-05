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
	$(".main-content").fitVids();
	
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

	$('.slideshow-grid-container, .slideshow-container').magnificPopup({
		delegate: 'a', // child items selector, by clicking on it popup will open
		type: 'image',
		gallery:{
		    enabled:true
		  },
		zoom: {
		    enabled: true, // By default it's false, so don't forget to enable it

		    duration: 300, // duration of the effect, in milliseconds
		    easing: 'ease-in-out', // CSS transition easing function 

		    // The "opener" function should return the element from which popup will be zoomed in
		    // and to which popup will be scaled down
		    // By defailt it looks for an image tag:
		    opener: function(openerElement) {
		      // openerElement is the element on which popup was initialized, in this case its <a> tag
		      // you don't need to add "opener" option if this code matches your needs, it's defailt one.
		      return openerElement.is('img') ? openerElement : openerElement.find('img');
		    }
		}
	});

	$('.slideshow-grid-container').masonry({
	  // options
	  itemSelector: '.slideshow-grid-item',
	  "gutter": 10
	});
	
});

$(document).foundation();

/*-------------------------------------------------*/
/*-------------------------------------------------*/
// Start Foundation Orbit Slider:
/*-------------------------------------------------*/
/*-------------------------------------------------*/
var sliderOptions = {
	containerClass: 'slider__slides', 
	slideClass: 'slider__slide',
	nextClass: 'slider__nav--next',
	prevClass: 'slider__nav--previous',

};


var slider = new Foundation.Orbit($('.slider'), sliderOptions);

/*-------------------------------------------------*/
/*-------------------------------------------------*/
//Wrap every iframe in a flex video class to prevent layout breakage
/*-------------------------------------------------*/
/*-------------------------------------------------*/
$('iframe').each(function(){
	$(this).wrap( "<div class='flex-video widescreen'></div>" );

});

/*-------------------------------------------------*/
/*-------------------------------------------------*/
//Distinguish dropdowns on mobile/desktop:
/*-------------------------------------------------*/
/*-------------------------------------------------*/

$('.nav__item--parent').click(function(event) {
  if (whatInput.ask() === 'touch') {
    // do touch input things
    if(!$(this).hasClass('nav__item--is-hovered')){
	    event.preventDefault();
	    $('.nav__item--parent').removeClass('nav__item--is-hovered');
	    $(this).toggleClass('nav__item--is-hovered')
    }
  } else if (whatInput.ask() === 'mouse') {
    // do mouse things
  }
});

//If anything in the main content container is clicked, remove faux hover class.
$('#main-content__container').click(function(){
	$('.nav__item').removeClass('nav__item--is-hovered');

});

/*-------------------------------------------------*/
/*-------------------------------------------------*/
//Site Search:
/*-------------------------------------------------*/
/*-------------------------------------------------*/

function toggleSearchClasses(){
	$("body").toggleClass("body--search-active");
	$("#site-search__form").toggleClass("site-search__form--is-inactive site-search__form--is-active");
	$("#site-search").toggleClass("site-search--is-inactive site-search--is-active");
	$(".header__screen").toggleClass("header__screen--grayscale");
	$(".main-content__container").toggleClass("main-content__container--grayscale");
	$(".nav__wrapper").toggleClass("nav__wrapper--grayscale");
	$(".nav__link--search").toggleClass("nav__link--search-is-active");

	//HACK: wait for 5ms before changing focus. I don't think I need this anymore actually..
	setTimeout(function(){
	  $(".nav__wrapper").toggleClass("nav__wrapper--search-is-active");
	}, 5);

	$(".nav").toggleClass("nav--search-is-active");

}

$(".nav__link--search").click(function(){
  	toggleSearchClasses();
  	if($("#nav__wrapper").hasClass("nav__wrapper--mobile-menu-is-active")){
  		toggleMobileMenuClasses();
  		$("#site-search").appendTo('#header').addClass('site-search--mobile');
  	}
  	document.getElementById("site-search__input").focus();
});

$(".nav__link--search-cancel").click(function(){
	toggleSearchClasses();
	document.getElementById("site-search__input").blur();
});

//When search form is out of focus, deactivate it.
$("#site-search").focusout(function(){
  	if($("#site-search").hasClass("site-search--is-active")){
  		//Not deactivating search right now on focus out for debugging purposes.
  		// deactivateSearch();
  	}
});

/*-------------------------------------------------*/
/*-------------------------------------------------*/
//Mobile Search:
/*-------------------------------------------------*/
/*-------------------------------------------------*/

if (Foundation.MediaQuery.atLeast('medium')) {
  // True if medium or large
  // False if small
  $("#site-search").addClass("site-search--desktop");
}else{
	$("#site-search").addClass("site-search--mobile");
}


$(".nav__toggle--search").click(function(){
  	toggleSearchClasses();



  	//append our site search div to the header.
  	$("#site-search").appendTo('#header').addClass('site-search--mobile');
  	document.getElementById("site-search__input").focus();
});

//If we're resizing from mobile to anything else, toggle the mobile search if it's active.
$(window).on('changed.zf.mediaquery', function(event, newSize, oldSize) {
	 if (oldSize == "small") {
	 	//alert('hey');
	 	$("#site-search").removeClass("site-search--mobile");
	 	$("#site-search").addClass("site-search--desktop");

		$("#site-search").appendTo("#nav");


	 	if($("#site-search").hasClass("site-search--is-active")){
	 		// toggleSearchClasses();
	 	}
	 }else if(newSize == "small"){
	 	$("#site-search").appendTo('#header');
 		$("#site-search").removeClass("site-search--desktop");
 		$("#site-search").addClass("site-search--mobile");
	 	if($("#site-search").hasClass("site-search--is-active")){
	 		// toggleSearchClasses();
	 	}
	 }

});

/*-------------------------------------------------*/
/*-------------------------------------------------*/
//Mobile Nav:
/*-------------------------------------------------*/
/*-------------------------------------------------*/

$(".nav__toggle--menu").click(function(){
	toggleMobileMenuClasses();

});

$(".nav__mobile-close-button").click(function(){
	toggleMobileMenuClasses();
});

function toggleMobileMenuClasses(){

	if($("#nav__wrapper").hasClass("nav__wrapper--mobile-menu-is-active")){
		$("#nav__wrapper").toggleClass("nav__wrapper--mobile-menu-is-active");
		setTimeout(function(){
		 $("#nav__wrapper").toggleClass("nav__wrapper--has-transition");
		}, 1000);
	}else{
		$("#nav__wrapper").toggleClass("nav__wrapper--has-transition");
		$("#nav__wrapper").toggleClass("nav__wrapper--mobile-menu-is-active");
	}

	$("html").toggleClass("html--no-scroll");

	
}

$(window).on('changed.zf.mediaquery', function(event, newSize, oldSize) {
	 if (oldSize == "small") {
	 	if($("#nav__wrapper").hasClass("nav__wrapper--mobile-menu-is-active")){
	 		toggleMobileMenuClasses();
	 	}
	 }
});



/*-------------------------------------------------*/
/*-------------------------------------------------*/
//Automatic full height silder, not working yet..
/*-------------------------------------------------*/
/*-------------------------------------------------*/

// function setDimensions(){
//    var windowsHeight = $(window).height();

//    $('.orbit-container').css('height', windowsHeight + 'px');
//   // $('.orbit-container').css('max-height', windowsHeight + 'px');

//    $('.orbit-slide').css('height', windowsHeight + 'px');
//    $('.orbit-slide').css('max-height', windowsHeight + 'px');
// }

// $(window).resize(function() {
//     setDimensions();
// });

// setDimensions();
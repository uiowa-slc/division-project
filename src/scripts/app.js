
$(document).foundation();

var bases = document.getElementsByTagName('base');
var baseHref = null;

if (bases.length > 0) {
    baseHref = bases[0].href;
}
/*-------------------------------------------------*/
/*-------------------------------------------------*/
// Lazy Loading Images:
/*-------------------------------------------------*/
/*-------------------------------------------------*/
var myLazyLoad = new LazyLoad({
    // example of options object -> see options section
    elements_selector: ".dp-lazy"
    // throttle: 200,
    // data_src: "src",
    // data_srcset: "srcset",
    // callback_set: function() { /* ... */ }
});

/*-------------------------------------------------*/
/*-------------------------------------------------*/
// Big Carousel (Home Page):
/*-------------------------------------------------*/
/*-------------------------------------------------*/

var $carousel = $('.carousel').flickity({
	imagesLoaded: true,
	percentPosition: false,
	selectedAttraction: 0.015,
	friction: 0.3,
	prevNextButtons: false,
	draggable: true,
	autoPlay: true,
	autoPlay: 8000,
	pauseAutoPlayOnHover: false,
	bgLazyLoad: true,
});

var $imgs = $carousel.find('.carousel-cell .cell-bg');
// get transform property
var docStyle = document.documentElement.style;
var transformProp = typeof docStyle.transform == 'string' ?
  'transform' : 'WebkitTransform';
// get Flickity instance
var flkty = $carousel.data('flickity');

$carousel.on( 'scroll.flickity', function() {
  flkty.slides.forEach( function( slide, i ) {
    var img = $imgs[i];
    var x = ( slide.target + flkty.x ) * -1/3;
    img.style[ transformProp ] = 'translateX(' + x  + 'px)';
  });
});

$('.carousel-nav-cell').click(function() {
	flkty.stopPlayer();
});

var $gallery = $('.carousel').flickity();

function onLoadeddata( event ) {
	var cell = $gallery.flickity( 'getParentCell', event.target );
	$gallery.flickity( 'cellSizeChange', cell && cell.element );
}

$gallery.find('video').each( function( i, video ) {
	video.play();
	$( video ).on( 'loadeddata', onLoadeddata );
});
/*-------------------------------------------------*/
/*-------------------------------------------------*/
// Slideshow block (in content):
/*-------------------------------------------------*/
/*-------------------------------------------------*/
var $slideshow = $('.slideshow').flickity({
	//adaptiveHeight: true,
	imagesLoaded: true,
	lazyLoad: true
});

var slideshowflk = $slideshow.data('flickity');

$slideshow.on( 'select.flickity', function() {
	console.log( 'Flickity select ' + slideshowflk.selectedIndex );
	//slideshowflk.reloadCells();
  
})

/*-------------------------------------------------*/
/*-------------------------------------------------*/
// Start Foundation Orbit Slider:
/*-------------------------------------------------*/
/*-------------------------------------------------*/
// var sliderOptions = {
// 	containerClass: 'slider__slides',
// 	slideClass: 'slider__slide',
// 	nextClass: 'slider__nav--next',
// 	prevClass: 'slider__nav--previous',

// };


// var slider = new Foundation.Orbit($('.slider'), sliderOptions);

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
  	if($("#mobile-nav__wrapper").hasClass("mobile-nav__wrapper--mobile-menu-is-active")){
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
$("#site-search__form").focusout(function(){
  	if($("#site-search__form").hasClass("site-search__form--is-active")){
  		//Comment out the following line if you need to use WebKit/Blink inspector tool on the search (so it doesn't lose focus):
  		//toggleSearchClasses();
  	}
});

$('input[name="Search"]').autocomplete({
    serviceUrl: baseHref+'/home/autoComplete',
    deferRequestBy: 100,
    triggerSelectOnValidInput: false,
    minChars: 2,
    autoSelectFirst: true,
    type: 'post',
    onSelect: function (suggestion) {
        $('#site-search__form').submit();
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

	 if (newSize == "medium") {
	 	//alert('hey');
	 	$("#site-search").removeClass("site-search--mobile");
	 	$("#site-search").addClass("site-search--desktop");

		$("#site-search").appendTo("#nav");


	 	if($("#site-search").hasClass("site-search--is-active")){
	 		// toggleSearchClasses();
	 	}
	 }else if(newSize == "mobile"){
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

/* new stuff added my Brandon - lazy coding */
$('.nav__toggle--menu').on('click', function(){
	$('.nav__menu-icon').toggleClass('is-clicked');
	$("#nav__menu-icon").toggleClass("nav__menu-icon--menu-is-active");
	$(this).parent().toggleClass('open');
});
$('.second-level--open').click(function(){
	$(this).parent().toggleClass('nav__item--opened');
});


/*-------------------------------------------------*/
/*-------------------------------------------------*/
// Background Video
/*-------------------------------------------------*/
/*-------------------------------------------------*/
$('.backgroundvideo__link').click(function(e){
	var that = $(this);
	var video = that.data('video');
	var width = $('img', that).width();
	var height = $('img', that).height();
	that.parent().addClass('on');
	that.parent().prepend('<div class="flex-video widescreen"><iframe src="http://www.youtube.com/embed/' + video + '?rel=0&autoplay=1" width="' + width + '" height="' + height + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>');
	that.hide();
	e.preventDefault();
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
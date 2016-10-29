
$(document).foundation();

var sliderOptions = {
	containerClass: 'slider__slides', 
	slideClass: 'slider__slide',
	nextClass: 'slider__navigation--next',
	prevClass: 'slider__navigation--previous',

};

var slider = new Foundation.Orbit($('.slider'), sliderOptions);

$('iframe').each(function(){
	$(this).wrap( "<div class='flex-video widescreen'></div>" );

});


//Search Code:

function activateSearch(){
	$("body").toggleClass("body--search-active");
	$("#site-search__form").toggleClass("site-search__form--is-inactive site-search__form--is-active");
	$("#site-search").toggleClass("site-search--is-inactive site-search--is-active");
	$(".main-content__container").toggleClass("main-content__container--grayscale");
	$(".navigation__wrapper").toggleClass("navigation__wrapper--grayscale");
	document.getElementById("site-search__input").focus();	
}

function deactivateSearch(){
	$("body").toggleClass("body--search-active");
	$("#site-search__form").toggleClass("site-search__form--is-active site-search__form--is-inactive");
	$("#site-search").toggleClass("site-search--is-active site-search--is-inactive");	
	$(".main-content__container").toggleClass("main-content__container--grayscale");
	$(".navigation__wrapper").toggleClass("navigation__wrapper--grayscale");
}

$(".navigation__link--search").click(function(){
  	activateSearch();
});

$(".site-search__cancel-button").click(function(){
	deactivateSearch();
});

//When search form is out of focus, deactivate it.
$("#site-search").focusout(function(){
  	if($("#site-search").hasClass("site-search--is-active")){
  		//alert('clicked outside of site search AND search is active!!');
  		//Not deactivating search right now on focus out for debugging purposes.
  		deactivateSearch();
  	}
});

//Automatic full height silder, not working yet..

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
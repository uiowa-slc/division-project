
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


function toggleSearchClasses(){
	$("body").toggleClass("body--search-active");
	$("#site-search__form").toggleClass("site-search__form--is-inactive site-search__form--is-active");
	$("#site-search").toggleClass("site-search--is-inactive site-search--is-active");
	$(".header__screen").toggleClass("header__screen--grayscale");
	$(".main-content__container").toggleClass("main-content__container--grayscale");
	$(".navigation__wrapper").toggleClass("navigation__wrapper--grayscale");
	$(".navigation__link--search").toggleClass("navigation__link--search-is-active");

	setTimeout(function(){
	  $(".navigation__wrapper").toggleClass("navigation__wrapper--search-is-active");
	}, 5);

	$(".navigation").toggleClass("navigation--search-is-active");
	
	document.getElementById("site-search__input").focus();	

}


$(".navigation__link--search").click(function(){
  	toggleSearchClasses();
  	document.getElementById("site-search__input").focus();
});

$(".navigation__link--search-cancel").click(function(){
	toggleSearchClasses();
});

//When search form is out of focus, deactivate it.
$("#site-search").focusout(function(){
  	if($("#site-search").hasClass("site-search--is-active")){
  		//alert('clicked outside of site search AND search is active!!');
  		//Not deactivating search right now on focus out for debugging purposes.
  		// deactivateSearch();
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
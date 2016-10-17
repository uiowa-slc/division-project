
$(document).foundation();

var sliderOptions = {
	containerClass: 'slider__slides', 
	slideClass: 'slider__slide',
	nextClass: 'slider__navigation--next',
	prevClass: 'slider__navigation--previous',

};

var slider = new Foundation.Orbit($('.slider'), sliderOptions);

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
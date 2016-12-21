
$(document).foundation();

/*-------------------------------------------------*/
/*-------------------------------------------------*/
// Start Foundation Orbit Slider:
/*-------------------------------------------------*/
/*-------------------------------------------------*/
var sliderOptions = {
	containerClass: 'slider__slides', 
	slideClass: 'slider__slide',
	nextClass: 'slider__navigation--next',
	prevClass: 'slider__navigation--previous',

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

$('.navigation__item--parent').click(function(event) {
  if (whatInput.ask() === 'touch') {
    // do touch input things
    if(!$(this).hasClass('navigation__item--is-hovered')){
	    event.preventDefault();
	    $('.navigation__item--parent').removeClass('navigation__item--is-hovered');
	    $(this).toggleClass('navigation__item--is-hovered')
    }
  } else if (whatInput.ask() === 'mouse') {
    // do mouse things
  }
});

//If anything in the main content container is clicked, remove faux hover class.
$('#main-content__container').click(function(){
	$('.navigation__item').removeClass('navigation__item--is-hovered');

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
	$(".navigation__wrapper").toggleClass("navigation__wrapper--grayscale");
	$(".navigation__link--search").toggleClass("navigation__link--search-is-active");

	//HACK: wait for 5ms before changing focus. I don't think I need this anymore actually..
	setTimeout(function(){
	  $(".navigation__wrapper").toggleClass("navigation__wrapper--search-is-active");
	}, 5);

	$(".navigation").toggleClass("navigation--search-is-active");

}

$(".navigation__link--search").click(function(){
  	toggleSearchClasses();
  	if($("#navigation__wrapper").hasClass("navigation__wrapper--mobile-menu-is-active")){
  		toggleMobileMenuClasses();
  		$("#site-search").appendTo('#header').addClass('site-search--mobile');
  	}
  	document.getElementById("site-search__input").focus();
});

$(".navigation__link--search-cancel").click(function(){
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

$('input[name="Search"]').autoComplete({
    minChars: 1,
    source: function(term, suggest){
        term = term.toLowerCase();
        var choices = [['Australia', 'au'], ['Austria', 'at'], ['Brasil', 'br'], ];
        var suggestions = [];
        for (var i=0;i<choices.length;i++)
            if (~(choices[i][0]+' '+choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]+console.log(choices[i]));
        suggest(suggestions);
        console.log("hello");
    },
    renderItem: function (item, search){
        search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
        var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
        return '<div class="autocomplete-suggestion" data-langname="'+item[0]+'" data-lang="'+item[1]+'" data-val="'+search+item[0].replace(re, "<b>$1</b>")+'</div>';
    },
    onSelect: function(e, term, item){
        alert('Item "'+item.data('langname')+' ('+item.data('lang')+')" selected by '+(e.type == 'keydown' ? 'pressing enter' : 'mouse click')+'.');
    }
});
// $('input[name="Search"]').autoComplete({

// 	minChars: 2,
// 	source: function(term, suggest){
// 		console.log("hello");
// 		term = term.toLowerCase();
// 		var choices = ['ActionScript', 'AppleScript', 'Asp','Johnson', 'James', 'Jameson'];
// 		var matches = [];
// 		for (var i=0; i<choices.length; i++)
// 			if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]+console.log(choices[i]));
// 		suggest(matches);
// 	}
// });
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


$(".navigation__toggle--search").click(function(){
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

		$("#site-search").appendTo("#navigation");


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

$(".navigation__toggle--menu").click(function(){
	toggleMobileMenuClasses();

});

$(".navigation__mobile-close-button").click(function(){
	toggleMobileMenuClasses();
});

function toggleMobileMenuClasses(){

	if($("#navigation__wrapper").hasClass("navigation__wrapper--mobile-menu-is-active")){
		$("#navigation__wrapper").toggleClass("navigation__wrapper--mobile-menu-is-active");
		setTimeout(function(){
		 $("#navigation__wrapper").toggleClass("navigation__wrapper--has-transition");
		}, 1000);
	}else{
		$("#navigation__wrapper").toggleClass("navigation__wrapper--has-transition");
		$("#navigation__wrapper").toggleClass("navigation__wrapper--mobile-menu-is-active");
	}

	$("html").toggleClass("html--no-scroll");

	
}

$(window).on('changed.zf.mediaquery', function(event, newSize, oldSize) {
	 if (oldSize == "small") {
	 	if($("#navigation__wrapper").hasClass("navigation__wrapper--mobile-menu-is-active")){
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
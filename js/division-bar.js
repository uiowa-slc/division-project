$(window).load(function() {	


    $('.search-toggle').click(function() {
        $(this).toggleClass('active');
        $('.division-search').slideToggle();
        return false;
    });

	$('.directory-toggle').click(function() {
		$(this).toggleClass("active");
		$('.division-directory').slideToggle();
		return false;
	});

    $('.division-menu').on('click', '.has-subnav a', function() {

        if ($(this).next('ul').is(':visible')) {
            $(this).next('ul').slideUp('fast');
            $(this).removeClass('active');
        } else {
            $(this).closest('ul').find('.active').next('ul').slideUp('fast');
            $(this).closest('ul').find('.active').removeClass('active');
            $(this).next().slideToggle('fast');
            $(this).addClass('active');
        }

    });

});
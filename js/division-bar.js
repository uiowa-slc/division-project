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
        $(this).next().slideToggle('slow');
        $(this).toggleClass('active');

    });

});
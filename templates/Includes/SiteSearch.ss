<div class="nav__item site-search site-search--is-inactive" id="site-search">
	<%-- <div class="nav__link nav__link--in-search site-search__icon">
		<i class="fa fa-lg fa-search site-search-button" aria-hidden="true"></i>
	</div> --%>
	<form id="site-search__form" class="site-search__form site-search__form--is-inactive site-search__form--nav-{$NavLength}" action="home/SearchForm">
		<input class="site-search__input site-search__input--nav-{$NavLength}" name="Search" type="search" id="site-search__input" title="Search this site" placeholder="Please enter a search term.">
		<button type="submit" name="action_results" class=" site-search__submit" value="Search" id="side-search__submit"><span class="show-for-sr">submit</span><i class="fas fa-lg fa-search" aria-hidden="true"></i></button>
	</form>
	<button class="nav__link--in-search nav__link--search-cancel site-search__icon"><span class="show-for-sr">close</span><i class="fas fa-lg fa-times site-search__cancel-button" aria-hidden="true"></i></button>
</div>
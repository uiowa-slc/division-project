<% require css(division-bar/css/_division-bar.css) %>
<div class="division-topbar">
    <div class="wrapper">
        <div class="division-directory clearfix">
            <div class="dosl-wrapper clearfix">
                <a href="http://studentlife.uiowa.edu/" class="dosl">
                    <img src="{$BaseHref}/division-bar/images/division-bar/dosl-logo.png" alt="Division of Student Life">
                </a>
                <p class="adr">
                    The Division of Student Life fosters student success by creating and promoting inclusive educationally purposeful services and activities within and beyond the classroom.
                </p>
            </div>
            <ul class="division-menu">
                <li class="has-subnav">
                    <a href="#" class="directory-link">Directory Navigation</a>
                    <div class="division-show-hide">
                        <ul class="menu-list">
                            <li><a href="http://studentlife.uiowa.edu/">Division of Student Life</a></li>
                            <li><a href="http://csil.uiowa.edu/">Center for Student Involvement &amp; Leadership</a></li>
                            <li><a href="http://www.uiowa.edu/ucs/">Counseling Service</a></li>
                            <li><a href="http://dos.uiowa.edu/">Dean of Students</a></li>
                        </ul>
                        <ul class="menu-list">
                            <li><a href="http://housing.uiowa.edu/">Housing & Dining</a></li>
                            <li><a href="http://imu.uiowa.edu/">Iowa Memorial Union</a></li>
                            <li><a href="http://pickone.uiowa.edu">Pick One</a></li>
                            <li><a href="http://recserv.uiowa.edu/Apps/Default.aspx">Recreational Services</a></li>
                        </ul>
                        <ul class="menu-list">
                            <li><a href="http://www.uiowa.edu/sds/">Student Disability Services</a></li>
                            <li><a href="http://studenthealth.uiowa.edu/">Student Health &amp; Wellness</a></li>
                            <li><a href="http://wrac.uiowa.edu/">Women&rsquo;s Resource &amp; Action Center</a></li>
                            <li><a href="http://studentlife.uiowa.edu/about/rocklin/">Vice President for Student Life</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div><!-- end .division-directory -->
        <div class="clearfix">
            <a href="http://www.uiowa.edu/" class="uiowa">
                <img src="{$BaseHref}/division-bar/images/division-bar/uiowa.png" alt="The University of Iowa" width="177">
            </a>

            <a href="#" class="directory-toggle">
                <img src="{$BaseHref}/division-bar/images/division-bar/division_studentlife.png" alt="Division of Student Life" width="224">
            </a>
		    <% if SearchForm %>
		    	<a href="#" class="search-toggle">Search</a>
		    <% end_if %>
        </div>
        <% if SearchForm %>
        <div class="division-search">
        <% with SearchForm %>
            <form $FormAttributes>
	            <label>Search</label>
                <input type="search" placeholder="Search" results="5" name="Search" class="division-search-input">
                <input type="submit" class="division-search-btn">
            </form>
        <% end_with %>
        </div>
        <% end_if %>    
     </div>
</div>
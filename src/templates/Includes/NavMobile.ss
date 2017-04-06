<div class="nav-mobile__wrapper" id="nav-mobile__wrapper">
  <!-- Close button -->
  <button class="close-button" aria-label="Close menu" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>
  <!-- Menu -->
  <ul class="nav-mobile">
    <li class="nav-mobile__item"><a class="nav-mobile__link nav-mobile__link--home" href="{$BaseUrl}">$SiteConfig.Title</a></li>
    <% loop $Menu(1) %>
    <li class="nav-mobile__item"><a class="nav-mobile__link" href="$Link">$MenuTitle</a>
    </li>
    <% end_loop %>
  </ul>

  <div class="nav-mobile__info">
    <% if $SiteConfig.DisableDivisionBranding %>
      <a href="http://uiowa.edu" class="nav-mobile__ui-logo"><img class="dp-lazy" data-original="division-project/images/ui-logo-footer.png" alt="The University of Iowa"></a>
    <% else %>
      <a href="http://studentlife.uiowa.edu" class="nav-mobile__dsl-logo"><img class="dp-lazy" width="300" height="81
    " data-original="{$ThemeDir}/dist/images/dosl-uiowa.png" alt="Division Of Student Life"></a>
    <% end_if %>
    <% if $SiteConfig.GroupSummary %>
      <div class="nav-mobile__summary">$SiteConfig.GroupSummary</div>
    <% else_if $SiteConfig.DisableDivisionBranding %>
      <div class="nav-mobile__summary"><p>In pursuing its missions of teaching, research, and service, the University seeks to advance scholarly and creative endeavor through leading-edge research and artistic production; to use this research and creativity to enhance undergraduate, graduate, and professional education, health care, and other services provided to the people of Iowa, the nation, and the world; and to educate students for success and personal fulfillment in a diverse world.</p></div>
    <% else_if $SiteConfig.Tagline %>
      <div class="nav-mobile__summary"><p>$SiteConfig.Tagline</p></div>
    <% else %>
      <div class="nav-mobile__summary"><p>The Division of Student Life fosters student success by creating and promoting inclusive educationally purposeful services and activities within and beyond the classroom.</p></div>
    <% end_if %>

    <div class="nav-mobile__location">
      <p>$SiteConfig.Address
        <% if $SiteConfig.PhoneNumber %>
          <br /><br />$SiteConfig.PhoneNumber
        <% end_if %>
        <% if $SiteConfig.EmailAddress %>
          <br /><br />$SiteConfig.EmailAddress
        <% end_if %>
      </p>
    </div>
  </div>
</div>

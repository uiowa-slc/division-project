<ul class="accordion" data-accordion data-allow-all-closed="true">
  <li class="accordion-item" data-accordion-item>
    <a href="#" class="accordion-title"><% if $ImageURL %><img class="accordion-img" src="$ImageURL" alt="" role="presentation"/><% end_if %><span>$Title</span></a>
    <div class="accordion-content" data-tab-content>
    	<span class="accordion-inner">
    	$Content.RAW
    	</span>
    </div>
  </li>
</ul>



<% if $Related %>
<h2>Related:</h2>
<ul class="featured-topic-list row large-up-2">

<% loop $Related %>
  <li class="featured-topic-list__item column column-block">

    <a href="$Link">
    <div class="row collapse">
    	<div class="featured-topic-list__icon-container show-for-large large-1 columns"><i class="fa fa-file-o fa-lg fa-fw"></i></div>
    	<div class="large-11 columns featured-topic-list__heading-container"><h3 class="job-list__heading">$Title</h3>

    	<p class="bloglistitem__category">
			<% loop $Categories.Limit(1) %><span href="$URL" class="bloglistitem__category">$Title</span><% end_loop %>
		</p></div>

    </div>

    </a>
  </li>
<% end_loop %>
</ul>
<% end_if %>
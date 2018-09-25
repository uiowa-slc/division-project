<% if $AreaName == "AfterContent" %>
<% if $RelatedNewsEntries %>
<section class="content-block__container" aria-labelledby="Block$ID">
	<div class="content-block row">
		<div class="column">
			<h3 id="Block$ID" class="newsblock-title text-center"><% if $Title && $ShowTitle %>$Title<% else %>Related News<% end_if %></h3>
		</div>
		<ul class="medium-up-3 ">
			<% loop $RelatedNewsEntries.limit(3) %>
				<li class="column column-block">
					<% include BlogCard %>
				</li>
			<% end_loop %>
		</ul>
	</div>
</section>
<% end_if %>

<% else_if $AreaName == "Sidebar" %>
<section class="content-block__container" aria-labelledby="Block$ID">
	<div class="content-block row column">
		<div class="newsblock">
			<h2 id="Block$ID" class="newsblock__header"><% if $Title && $ShowTitle %>$Title<% else %>Related News<% end_if %></h2>
			<ul>
				<% loop $RelatedNewsEntries.limit(3) %>
					<% include RelatedNewsContent %>
				<% end_loop %>
			</ul>
		</div>
	</div>
</section>
<% else %>

<section class="content-block__container" aria-labelledby="Block$ID">
	<div class="content-block row column">
		<div class="$CSSClasses">
			<h2 id="Block$ID" class="newsblock__header"><% if $Title && $ShowTitle %>$Title<% else %>Related News<% end_if %></h2>
			<% loop $RelatedNewsEntries.limit(3) %>
				<% include BlogCard %>
			<% end_loop %>
			<br>
		</div>
	</div>
</section>
<% end_if %>
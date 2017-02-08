<% if $RelatedNewsEntries %>
<section class="content-block__container relatednews">
	<div class="content-block row">
		<div class="$CSSClasses">
			<div class="column">
				<h2 class="relatednews-title text-center"><% if $Title %>$Title<% else %>Related News<% end_if %></h2>
			</div>
			<ul class="medium-up-3 ">
				<% loop $RelatedNewsEntries.limit(3) %>
					<li class="column column-block">
						<% include BlogCard %>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</div>
</section>
<% end_if %>

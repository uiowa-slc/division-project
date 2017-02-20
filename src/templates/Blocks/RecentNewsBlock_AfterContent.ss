<% if $Entries %>
<section class="content-block__container recentnews">
	<div class="content-block row">
		<div class="$CSSClasses">
			<div class="column">
				<h3 class="recentnews-title text-center"><% if $Title %>$Title<% else %>Recent News<% end_if %></h3>
			</div>
			<ul class="medium-up-3 ">
				<% loop $Entries.limit(3) %>
					<li class="column column-block">
						<% include BlogCard %>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</div>
</section>
<% end_if %>

<% if $Entries %>
<section class="content-block__container recentnews" aria-labelledby="Block$ID">
	<div class="content-block row">
		<div class="newsblock">
			<div class="column">
				<h3 class="newsblock-title text-center" id="Block$ID"><% if $Title && $ShowTitle %>$Title<% else %>Recent News<% end_if %></h3>
			</div>
			<ul class="medium-up-3 ">
				<% loop $Entries %>
					<li class="column column-block">
						<% include BlogCard %>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</div>
</section>
<% end_if %>

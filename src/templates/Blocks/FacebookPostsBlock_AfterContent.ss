<% if $Entries %>
<section class="content-block__container recentnews">
	<div class="content-block row">
		<div class="newsblock">
			<div class="column">
				<h3 class="recentnews-title text-center"><% if $Title && $ShowTitle %>$Title<% else %>Latest posts<% end_if %></h3>
			</div>
			<ul class="medium-up-3 ">
				<% loop $Entries.limit(3) %>
					<li class="column column-block">
						<% include FbPostCard%>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</div>
</section>
<% end_if %>

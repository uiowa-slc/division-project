<section class="content-block__container">
	<div class="content-block row column">
		<div class="">
			<div class="$CSSClasses">
				<h2 class="relatednewsblock__header">$Title</h2>
				<ul>
					<% loop $RelatedNewsEntries(3) %>
						<% include RelatedNewsContent %>
					<% end_loop %>
				</ul>
			</div>
		</div>
	</div>
</section>
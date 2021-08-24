$Header
<div class="main-content__container" id="main-content__container">
	<div class="row">
		<div class="main-content main-content--with-padding main-content--full-width">
			<h1>$Title</h1>
			<% if $Query %>
				<p>You searched for &ldquo;{$Query}&rdquo;</p>
				<% if $Results %>
					<ul class="article-list">
						<% loop $Results %>
							<li class="article-list__item">
								<article class="article-list__body clearfix">

									<% if $BackgroundImage %>
										<a href="$Link" class="border-effect article-list__img">
										<img src="$BackgroundImage.FocusFill(180,150).URL" alt="$Title" >
										</a>
									<% else_if $Photo %>
										<a href="$Link" class="border-effect article-list__img">
										<img src="$Photo.FocusFill(180,150).URL" alt="$Title" >
										</a>
									<% else_if $MainImage %>
										<a href="$Link" class="border-effect article-list__img">
										<img src="$MainImage.Pad(180,150).URL" alt="$Title">
										</a>
									<% end_if %>
									<% if $NiceName %><p class="article-list__type">$NiceName</p><% end_if %>
									<h4 class="article-list__header">
										<a href="$Link" class="article-list__link">
										<% if $MenuTitle %>
											$MenuTitle
										<% else %>
											$Title
										<% end_if %>
										</a>
									</h4>

									<!-- Show Staff Member Details -->
									<% if $Position %>$Position<% end_if %>
									<% if $EmailAddress || $Phone || $DepartmentName %>
										<ul class="article-list__staffinfo">
											<% if $EmailAddress %><li><strong>Email:</strong> <a href="mailto:$EmailAddress">$EmailAddress</a></li><% end_if %>
											<% if $Phone %><li><strong>Phone:</strong> $Phone</li><% end_if %>
											<% if $DepartmentName %>
												<li>
													<% if $DepartmentURL %>
														<a href="$DepartmentURL" target="_blank">Department website</a>
													<% else %>
														$DepartmentName
													<% end_if %>
												</li>
											<% end_if %>
										</ul>
									<% end_if %>
									<!-- end Staff Member -->

									<!-- Show Blog publish info -->
									<% if $PublishDate %>
										<% include AuthorBylineFull %>
									<% end_if %>

                                    <% if $MetaDescription %>
                                        <p class="article-list__text">$MetaDescription.LimitCharacters(200)</p>
                                    <% else %>
                                        <p class="article-list__text">$ContentSummary</p>
                                    <% end_if %>

									<a href="$AbsoluteLink" class="article-list__url">$AbsoluteLink</a>
								</article>
							</li>
						<% end_loop %>
					</ul>
					<!-- Pagination -->
					<% if $Results.MoreThanOnePage %>
						<ul class="pagination text-center" role="navigation" aria-label="Pagination">
							<% if $Results.NotFirstPage %>
								<li class="pagination-previous">
									<a href="{$Results.PrevLink}" aria-label="Next page">Previous</a>
								</li>
							<% else %>
								<li class="pagination-previous disabled">Previous</li>
							<% end_if %>
							<% loop $Results.PaginationSummary(4) %>
								<% if $CurrentBool %>
									<li class="current"><span class="show-for-sr">You're on page</span>$PageNum</li>
								<% else %>
									<% if $Link %>
										<li><a href="$Link" aria-label="Page $PageNum">$PageNum</a></li>
									<% else %>
										<li class="ellipsis"></li>
									<% end_if %>
								<% end_if %>
							<% end_loop %>
							<% if $Results.NotLastPage %>
								<li class="pagination-next"><a href="{$Results.NextLink}" aria-label="Next page">Next</a></li>
							<% else %>
								<li class="pagination-next disabled">Next</li>
							<% end_if %>
						</ul>
					<% end_if %>
					<!-- end pagination -->
				<% else %>
					<p>Sorry, your search query did not return any results.</p>
				<% end_if %>
			<% else %>
				<p>No search term specified. Please enter a search term below:</p>
				$SearchForm
				<hr />
			<% end_if %>

		</div>
	</div>
</div>

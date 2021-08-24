<% if Pages %>
	<nav class="breadcrumb no-print" aria-labelledby="breadcrumb__title">
        <div class="column row">
            <h2 class="sr-only" id="breadcrumb__title">Breadcrumb</h2>
			<ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="$absoluteBaseURL">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>
          
				<% loop Pages %>
					<% if Last %>
						<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                            <span class="show-for-sr">Current: </span>
                            <span itemprop="name">$Title.XML</span>
                            <meta itemprop="position" content="$Pos(2)" />
						</li>
					<% else %>
						<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                            <a href="$Link" itemprop="item">
                                <span itemprop="name">$MenuTitle.XML</span>
                            </a>
                            <meta itemprop="position" content="$Pos(2)" />
						</li>
					<% end_if %>
				<% end_loop %>
			</ol>
		</div>
	</nav>
<% end_if %>

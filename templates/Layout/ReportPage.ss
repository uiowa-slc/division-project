<% include BackgroundImage %>
<div class="gradient">
	<div class="container clearfix">
		<div class="white-cover"></div>
	    <section class="main-content <% if $BackgroundImage %>margin-top<% end_if %>">
	    	$Breadcrumbs
		    <article>
				<h1 class="postTitle">$Title</h1>
				<% if TagsCollection %>
					<p class="tags">
						 <% _t('TAGS', 'Tags:') %>
						<% control TagsCollection %>
							<a href="$Link" title="<% _t('VIEWALLPOSTTAGGED', 'View all posts tagged') %> '$Tag'" rel="tag">$Tag</a><% if not Last %>,<% end_if %>
						<% end_control %>
					</p>
				<% end_if %>

				$Content

		    </article>
		</section>
	    <section class="sec-content">
	    	<%-- include SideNav --%>
	    	<% include BlogSideBar %>
	   </section>
	</div>
</div>

<% include TopicsAndNews %>




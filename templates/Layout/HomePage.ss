<style>
.hero {
  border-bottom: 5px solid #ffce39;
  position: relative;
  padding: 2em 0;
  background-color: #FFF;
}
@media screen and (min-width: 480px) and (max-width: 768px) {
  .hero {
    background: black url({$ThemeDir}/images/hero-image-md.jpg) no-repeat center top;
    padding: 4em 0;
  }
}
@media screen and (min-width: 768px) {
  .hero {
    background: black url({$ThemeDir}/images/hero-image.jpg) no-repeat center top;
    padding: 0;
    height: 665px;
  }
}
</style>
<div class="hero">
        <div class="container clearfix">

        <% if HomePageHeroFeatures.limit(2) %>
            <div class="hero-article-wrapper">

                <% loop HomePageHeroFeatures %>
                <div class="hero-article clearfix">
                    <% if $Image %>
                    	<% if $UseExternalLink %>
                    		<a href="$ExternalLink" target="_blank"><img src="$Image.URL" alt=""></a>
                    	<% else %>
                        	<a href="$AssociatedPage.Link"><img src="$Image.URL" alt=""></a>
                        <% end_if %>
                    <% end_if %>
                    <h3 class="hero-title">
	                    <% if $UseExternalLink %>
	                    	<a href="$ExternalLink" target="_blank">$Title</a>
	                    <% else %>
	                    	<a href="$AssociatedPage.Link">$Title</a>
	                    <% end_if %>
                    </h3>
                    <div class="hero-content">$Content</div>
                    <% if $UseExternalLink %>
                    	<a href="$ExternalLink" target="_blank" class="hero-link">Read More</a>
                    <% else %>
                    	<a href="$AssociatedPage.Link" class="hero-link">Read More</a>
                    <% end_if %>
                </div>
              <% end_loop %>


	          </div>
         <% end_if %>

         <% include HomePageHeroText %>

        </div>

    </div>
	<section class="home-highlights">
        <div class="container clearfix">
	        <% loop HomePageFeatures.Limit(3) %>
	            <div class="module">
	                <div class="media">
	                <% if $YouTubeEmbed %>
	                	$YouTubeEmbed
	                <% else %>
	                    <a href="$AssociatedPage.Link">
	                        <img src="$Image.CroppedImage(350,197).URL" alt="$Title">
	                    </a>
	                <% end_if %>
	                </div>
	                <div class="inner">
	                    <h3><a href="$AssociatedPage.Link">$Title</a></h3>
	                    	$Content
	                </div>
	            </div>
	         <% end_loop %>
         </div><!-- end .container -->
    </section>

    <%-- <% include TopicsAndNews %> --%>

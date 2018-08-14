$Header<style>.legacy-hp__hero {
 
  position: relative;
  padding: 2em 0;
  background-color: #000;
}
@media screen and (min-width: 480px) and (max-width: 768px) {
  .legacy-hp__hero { <% if $BackgroundFeature %> background: black url({$BackgroundFeature.Image.URL}) no-repeat center top; <% else %> background: black url({$ThemeDir}/images/hero-image-md.jpg) no-repeat center top; <% end_if %> padding: 4em 0;
  }
}
@media screen and (min-width: 768px) {
  .legacy-hp__hero { <% if $BackgroundFeature %> background-image: url({$BackgroundFeature.Image.URL}); <% else %> background-image: url({$ThemeDir}/images/hero-image.jpg); <% end_if %> padding: 0;
  }
}</style><div class="legacy-hp__hero"><div class="legacy-hp__container clearfix"> <% if HomePageHeroFeatures.Limit(2) %> <div class="legacy-hp__hero-article-wrapper"> <% loop HomePageHeroFeatures.Limit(2) %> <% include HomePageHeroFeature %> <% end_loop %> </div> <% end_if %> <% include HomePageHeroText %> </div></div><section class="legacy-hp__home-highlights"><div class="legacy-hp__container clearfix"> <% loop HomePageFeatures.Limit(3) %> $forTemplate <% end_loop %> </div></section>
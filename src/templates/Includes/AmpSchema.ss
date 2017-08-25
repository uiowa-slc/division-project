<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "NewsArticle",
	"mainEntityOfPage": "$AbsoluteLink",
	"headline": "$Title",
	"datePublished": "$PublishDate.format(c)",
	"dateModified": "$LastEdited.format(c)",
	<% if $Credits %>
		"author": {
		<% loop $Credits %>
			"@type": "Person",
			"name": "$Name.XML"
		<% end_loop %>
		},
	<% end_if %>
	"publisher": {
		"@type": "Organization",
		"name": "$SiteConfig.Title",
		"logo": {
			"@type": "ImageObject",
			"url": "http://cdn.ampproject.org/logo.jpg",
			"width": 600,
			"height": 60
		}
	},
	<% if $FeaturedImage %>
		"image": {
			"@type": "ImageObject",
			"url": "$FeaturedImage.CroppedFocusedImage(1024,682).URL",
			"height": 1024,
			"width": 682
		}
	<% end_if %>
}
</script>
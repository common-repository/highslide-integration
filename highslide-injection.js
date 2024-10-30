jQuery(document).ready(function() {
	
	// attach highslide-CSS-class to linked images in a post
	jQuery("a[href$='jpg'] img, a[href$='JPG'] img, a[href$='jpeg'] img, a[href$='JPEG'] img, a[href$='png'] img, a[href$='PNG'] img, a[href$='gif'] img, a[href$='GIF'] img").parent().addClass("highslide");

	// uncomment block below, to group images in slideshougroups (CSS-class "post" required in template)
	//jQuery(".post").each(function(index) {		
	//	jQuery(this).find("a.highslide").each(function() {
	//		this.onclick = function() {
	//			return hs.expand(this, { slideshowGroup: index });
	//		}
	//	});
	//});
	
	// add comment slahes to the block below, to group images in slideshougroups	
	jQuery("a.highslide").each(function() {
		this.onclick = function() {
			return hs.expand(this);
		}
	});

});
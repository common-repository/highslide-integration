// HIDE CREDITS
hs.showCredits = false;

// SHOW IMAGE TITLES AS CAPTIONS
// hs.captionEval = 'this.thumb.title'; 
// hs.captionOverlay.position = 'below';

// DROP SHADOW
hs.outlineType = "drop-shadow";

// USE GRAPHICAL EFFECTS
hs.transitions = ['expand', 'crossfade'];
hs.fadeInOut = true;
hs.expandDuration = 150;
hs.restoreDuration = 150;

// SHOW SLIDESHOW CONTROLBAR
hs.addSlideshow({
   interval: 5000,
   repeat: false,
   useControls: true,
   fixedControls: 'fit',
	overlayOptions: {
		className: 'large-dark',
		opacity: '0.75',
		position: 'bottom center',
		offsetX: '0',
		offsetY: '-25',
		hideOnMouseOut: true
	}
});

// DIMM WEBSITE WHEN IMAGE IS OPEN
// hs.dimmingOpacity = 0.75;

// SHOW CLOSE-BUTTON
// hs.registerOverlay({
//    html: '<div class="closebutton" onclick="return hs.close(this)" title="Schließen"></div>',
//    position: 'top right',
//    fade: 2
// });
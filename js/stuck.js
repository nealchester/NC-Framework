// From: https://usefulangle.com/demos/108/sticky.html

var observer = new IntersectionObserver(function(entries) {
	if(entries[0].intersectionRatio === 0)
		document.querySelector(".is-sticky").classList.add('sticky-enabled');
	else if(entries[0].intersectionRatio === 1)
		document.querySelector(".is-sticky").classList.remove("sticky-enabled");
}, { threshold: [0,1] });

observer.observe(document.querySelector(".sticky-trigger"));

/*
// The HTML

<div class="sticky-trigger"></div> // this must be placed before the sticky element
<div class="is-sticky">...</div> // the class must be included on the element that will be sticky
When the element is stuck the attribute "data-sticky='stuck'"

*/
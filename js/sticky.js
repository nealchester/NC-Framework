/*
Sticky header.
https://css-tricks.com/how-to-detect-when-a-sticky-element-gets-pinned/
Add the class "ncsticky" to any element that is using "position: sticky; top-1px" 
and a new class of "ncsticky-enabled" will be added once the element is stuck. 

NOTE: This will only work on one element. To support more elements, duplicate this code and create new classes.
*/

const el = document.querySelector(".ncsticky")
const observer = new IntersectionObserver( 
([e]) => e.target.classList.toggle("ncsticky-enabled", e.intersectionRatio < 1),
{ threshold: [1] }
); observer.observe(el);
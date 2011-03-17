/**
 * YET ANOTHER BEER SHOW
 * MixPanel Event Tracking
 *
 * Attaches events for tracking page loads, video plays, and other site
 * actions
 *
 * Colin McCloskey
 * Mar 2011
 */


/**
 * Attach mixpanel analytics to some page events */
$(function() {
  // Page load:  
  mpmetrics.track("Page View", {
    'path': document.location.pathname,
    'title': document.title
  });
  
    
  
});

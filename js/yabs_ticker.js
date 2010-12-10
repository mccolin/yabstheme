/**
 * YET ANOTHER BEER SHOW
 * News Ticker JavaScript Attachment
 *
 * Attaches events for the ticker at the pagetop. Registers an event
 * to trigger rotating news stories out of paragraphs rendered to a
 * hidden layer in the header.
 *
 * Colin McCloskey
 * Dec 2010
 */


/**
 * Function controlling the news story ticker at page top */
function rotateTickerBlurbs(idx, delay) {
  if (idx == undefined) { idx = 1; }
  if (delay == undefined) { delay = 5000; }
  $("#ticker p").hide();
  var blurbToShow = $("#ticker p:nth-child("+idx+")");
  if ( blurbToShow.length == 0 ) {
    idx = 1;
    blurbToShow = $("#ticker p:nth-child("+idx+")");
  }
  blurbToShow.show();
  $("#ticker span").show();
  setTimeout("rotateTickerBlurbs("+(idx+1)+");", delay);
  return(false);
}


/**
 * Attach the rotator to page load */
$(function() {
  rotateTickerBlurbs(1, 5000);
});

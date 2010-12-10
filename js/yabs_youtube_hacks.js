/**
 * YET ANOTHER BEER SHOW
 * YouTube Video and Thumbnail Hacks
 *
 * Tricks for highlighting and featuring YouTube Videos on the index
 * and video gallery pages of the site.
 *
 * Colin McCloskey
 * Dec 2010
 */
 
// Stash a timer reference for any thumbnail on the page that may be
// undergoing the rotation effect
var THUMB_TIMER = null;

/**
 * Rotate the images of a YouTube thumbnail amongst the known official
 * content provided by img.youtube.com for the given video */
function rotateYouTubeThumb(imgId) {
 var img = $("#"+imgId);
 var src = img.attr("src");              // eg: http://img.youtube.com/vi/1U7bigXhRI4/0.jpg
 var basename = src.split("/").pop();
 var idx = basename.split(".", 1) * 1;
 var newIdx = idx + 1;
 if (newIdx > 3) { newIdx = 1 };
 newSrc = src.replace(basename, newIdx+".jpg");
 img.attr("src", newSrc);
 THUMB_TIMER = setTimeout("rotateYouTubeThumb(\""+imgId+"\");", 750);
 return(false);
}

/**
 * Stop the ongoing rotation of a YouTube thumbnail */
function unRotateYouTubeThumb() {
 clearTimeout(THUMB_TIMER);
}

/** Stop any ongoing thumbnail rotation and then reset the
 * thumbnail for higher-size images */
function resetYouTubeThumb(imgId) {
  unRotateYouTubeThumb();
  var img = $("#"+imgId);
  var src = img.attr("src");              // eg: http://img.youtube.com/vi/1U7bigXhRI4/0.jpg
  var basename = src.split("/").pop();
  newSrc = src.replace(basename, "0.jpg");
  img.attr("src", newSrc);  
}


/**
 * Document ready function which will attach the appropriate event
 * functions to the necessary objects on the page at load time.
 *
 * This injection does the following:
 *  * On the index, engages the first video and selected thumbnail
 *  * Attaches rotateYouTubeThumb() to all thumb mouseenter events
 *  * Attaches unRotateYouTubeThumb() to all thumb mouseleave events
 */
$(function() {
  //Show the first featured video and activate its thumbnail:
  $("#features .video:first").show();    
  $("#thumb-container .thumb:first").addClass("active");
  
  // Add click actions to all of the featured video thumbs on index
  $("#thumb-container .thumb").click(function(){
    var thumbId = $(this).attr("id");
    var vidId = thumbId.replace("thumb","video");
    $("#features .video").hide();
    $("#"+vidId).show();
    $("#thumb-container .thumb").removeClass("active");
    $("#"+thumbId).addClass("active");
  });   
  
  // Add a hover-effect to all featured video thumbs on index
  $("#thumb-container .thumb").mouseenter(function(){
    var divId = $(this).attr("id");
    var imgId = divId.replace("thumb","img");
    rotateYouTubeThumb( imgId );
  });
  
  // Unhover all featured video thumbs on index
  $("#thumb-container .thumb").mouseleave(function(){
    unRotateYouTubeThumb();
  });
  
  // Add a hover effect to all video thumbs in video gallery
  $(".gallery .video").mouseenter(function(){
    var divId = $(this).attr("id");
    var imgId = divId.replace("video","img");
    rotateYouTubeThumb( imgId );
  });
  
  // Add a hover-killer on the gallery page, too:
  $(".gallery .video").mouseleave(function(){
    var divId = $(this).attr("id");
    var imgId = divId.replace("video","img");
    resetYouTubeThumb(imgId);
  });
  
});


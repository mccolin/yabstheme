/**
 * YET ANOTHER BEER SHOW
 * Customized YouTube Player
 *
 * Manipulates the YouTube JS APIs to control the Chromeless, JS-based
 * version of the YouTube video player used within the site.
 *
 * Colin McCloskey
 * Dec 2010
 */
 
  function yabsAlert(msg) {
    if ( $("#playerconsole") )
      $("#playerconsole").val("ALERT: "+msg+"\n"+$("#playerconsole").val());
    return(false);
  }

  function onYouTubePlayerReady(playerId) {
    vidPlayer = document.getElementById("yabs_video_player");
    setInterval(updatePlayerControls, 250);
    updatePlayerControls();
    vidPlayer.addEventListener("onStateChange", "onPlayerStateChange");
    vidPlayer.addEventListener("onError", "onPlayerError");    
    $("#featured_video_thumbs .thumb:first").trigger("loadready");    
  }

  function onPlayerStateChange(newState) {
    return(false);
    yabsAlert("State Changed: "+newState);
  }

  function onPlayerError(errorCode) {
    return(false);
    yabsAlert("Player Error Occurred: "+errorCode);
  }
  
  function updatePlayerControls() {
    if (vidPlayer) {
      var width = parseInt( $("#featured_video_controls .progress:first").css("width") );
      var pxBytes = ( vidPlayer.getVideoBytesLoaded() / vidPlayer.getVideoBytesTotal() ) * width;
      var pxTime = ( vidPlayer.getCurrentTime() / vidPlayer.getDuration() ) * width;
      $("#featured_video_controls .progress.load").css("width", parseInt(pxBytes)+"px");
      $("#featured_video_controls .progress.play").css("width", parseInt(pxTime)+"px");
    }
    return(false);
  }

  /**
   * Load a video into the player and start its activity, given the unique
   * YouTube video id. This will trigger load and play of a video. */
  function loadVideo(id, startSeconds) {
    if (vidPlayer) {
      vidPlayer.loadVideoById(id, parseInt(startSeconds));
      yabsAlert("Video loaded: "+id);
    }
  }

  /**
   * Cue up a video, given its unique id. This will display a preview, but not
   * begin loading or playback of the video. Should be called on player ready. */
  function cueVideo(id, startSeconds) {
    if (vidPlayer) {
      vidPlayer.cueVideoById(id, parseInt(startSeconds));
      yabsAlert("Video cued: "+id);
    }
  }

  /**
   * Start or resume playback of a loaded video */
  function playVideo() {
    if (vidPlayer) {
      vidPlayer.playVideo();
    }
  }

  /**
   * Pause playback of a loaded and playing video */
  function pauseVideo() {
    if (vidPlayer) {
      vidPlayer.pauseVideo();
    }
  }

  /**
   * Stop playback and uncue the current video and its loaded portion */
  function stopVideo() {
    if (vidPlayer) {
      vidPlayer.stopVideo();
    }
  }

  /**
   * Return the current state (playing, paused, loaded, not ready, etc.) of
   * the video player */
  function getPlayerState() {
    if (vidPlayer) {
      return vidPlayer.getPlayerState();
    }
  }

  /**
   * Move a loaded video to the given second-marker */
  function seekTo(seconds) {
    if (vidPlayer) {
      vidPlayer.seekTo(seconds, true);
    }
  }


  /**
   * Return the byte point at which loading started. This is typically
   * zero, but can be different if the user has jumped around the video. */
  function getStartBytes() {
    if (vidPlayer) {
      return vidPlayer.getVideoStartBytes();
    }
  }


  /**
   * Mute the volume on current video playback */
  function muteVideo() {
    if (vidPlayer) {
      vidPlayer.mute();
    }
  }

  /**
   * Set the volume to its pre-muted level */
  function unMuteVideo() {
    if (vidPlayer) {
      vidPlayer.unMute();
    }
  }


  /**
   * Set a specific volume between 0 and 100 for the video player */
  function setVolume(newVolume) {
    if (vidPlayer) {
      vidPlayer.setVolume(newVolume);
    }
  }

  /**
   * Return the current volume of the video player */
  function getVolume() {
    if (vidPlayer) {
      return vidPlayer.getVolume();
    }
  }

  /**
   * Clear everything of the current video from the video player */
  function clearVideo() {
    if (vidPlayer) {
      vidPlayer.clearVideo();
    }
  }




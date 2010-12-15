<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage YetAnotherBeerShow
 * @since YetAnotherBeerShow 0.9
 */

get_header(); ?>

<div id="features-wrapper" class="wrapper">
  
  <div id="features" class="section">
    <div id="intro">
      <h2>That page doesn't exist, but don't worry, there are others!</h2>
      <p>We've recently redesigned our site at <strong>Yet Another Beer Show</strong>,
        so there's a chance some things have moved around.</p>
      <p>
        <a href="/topics/beer">Check our beer list</a>,
        <a href="/topics/video">Watch an episode</a>, or
        <a href="/">Start from the beginning</a>
      </p>
      <p>
        You can also <strong>search for anything</strong> you think we have inside:
        <?php get_search_form(); ?>
      </p>
      
      <script>
        /* Focus the search field when the page loads: */
        document.getElementById("s").focus();
      </script>
    </div>
    
    
    <div id="player-container">
      <div id="player">
        <div id="featured_video_player"> 
          You need Flash player 8+ and JavaScript enabled to view this video.
        </div> 
        <script type="text/javascript"> 
          // <![CDATA[
          // Prepare the video player:
          var params = { allowScriptAccess: "always", bgcolor: "#BE8F4B", wmode: "transparent" };
          var attr = { id: "yabs_video_player" };
          swfobject.embedSWF("http://www.youtube.com/apiplayer?enablejsapi=1&playerapiid=ytplayer", 
                             "featured_video_player", "490", "275", "8", null, null, params, attr);
          //]]>
        </script>
      
        <div id="featured_video_controls">
          <a href="#__" class="play-button" onclick="playVideo();"></a>
          <a href="#__" class="pause-button" onclick="pauseVideo();"></a>
          <!-- a href="#__" class="stop-button" onclick="stopVideo();">Stop</a -->
          <div class="progress"><div class="progress load"><div class="progress play"></div></div></div>
          
          <!-- Disable Volume Control
          <a href="#__" class="mute-button" onclick="muteVideo();">Mute</a>
          <a href="#__" class="unmute-button" onclick="unMuteVideo();">Unmute</a>
          -->
        </div>
      
        <div id="featured_video_notes">
          This div will contain notes about the currently playing video, as well as
          a link to the full entry.
        </div>
      </div>
      
      <!-- Featured Videos Thumbnails -->
      <div id="featured_video_thumbs">
        <?php
          $temp_query = $wp_query;
          $args = array(
            'category_name' => 'video',
            'showposts' => 4
          );
          query_posts($args);
          while ( have_posts() ): the_post();
            if ($content = $post->post_content):
              $wp_id = $post->ID;
              $yt_id = extract_youtube_id($content);
              $yt_url = extract_youtube_thumb_url($content);
        ?>
        <div class="thumb" id="thumb-<?php echo $wp_id;?>-<?php echo $yt_id;?>">
          <img id="img-<?php echo $wp_id;?>-<?php echo $yt_id;?>" src="<?php echo $yt_url;?>"/>
          <span class="video_info">
            <h3><a href="#__" onclick="loadVideo('<?php echo $yt_id;?>');"><?php echo get_the_title($post->ID); ?></a></h3>
            <span class="excerpt"><?php the_excerpt(); ?></span>
          </span>
        </div>
        
        <?php 
            endif; 
          endwhile; 
          wp_reset_query();
        ?>
      </div>
      
    </div> <!--/#player-->
    
    <div class="clear"></div>
  </div> <!--/features-->
  
</div> <!--/features-wrapper-->


  
  <div id="footer-wrapper" class="wrapper">
    <div id="footer" class="section">
      <h2 class="mast"><span>Yet Even More Stuff</span></h2>
      <?php get_footer(); ?>
    </div> <!--/footer-->
  </div> <!--/footerwrap-->


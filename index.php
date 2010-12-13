<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage YetAnotherBeerShow
 * @since YetAnotherBeerShow 0.9
 */

get_header(); ?>

<?php if(is_home() && $post==$posts[0] && !is_paged()) : ?>
<div id="features-wrapper" class="wrapper">
  
  <div id="features" class="section">
    <div id="intro">
      <?php 
      if ($page = get_page_by_title('Intro')) :
        $content = $page->post_content;
        echo $content;
      else : ?>
        <h2>We love beer and you can, too!</h2>
        <p>Welcome to <strong>Yet Another Beer Show</strong>. We are a video
          beer review show, giving you at least two dudes reviewing one beer,
          nearly every day of the week!</p>
        <p>Check out any of our episodes or look through the extensive list of
          beers we've reviewed to find something perfect for you.</p>
        <p>
          <a href="/topics/beer">Find a beer</a> or
          <a href="/topics/video">Watch an epsiode</a>
        </p>
      <?php endif;
      ?>
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
    
    
    
    
    
    
    <?php if (false):    /******* BEGIN OLD FEATURES AND THUMBNAIL ********/ ?>
    <div id="player">
      <div id="video-container">
      <?php $temp_query = $wp_query; ?>
      <?php query_posts('category_name=video&showposts=4'); ?>
      <?php while (have_posts()) : the_post(); ?>
        <!-- FEATURED VIDEO POST: ID: <?php the_ID(); ?> -->
        <div class="video" id="video-<?php the_ID(); ?>">
          <?php if($content = $post->post_content) : ?>
            <?php echo extract_youtube_video($content, 490, 300) ?>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_query();?>
      </div> <!--/video-container-->
    
      <div id="thumb-container">
      <?php $temp_query = $wp_query; ?>
      <?php query_posts('category_name=video&showposts=4'); ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php if($content = $post->post_content) : ?>
          <div class="thumb" id="thumb-<?php the_ID(); ?>">
            <img id="img-<?php the_ID(); ?>" src="<?php echo extract_youtube_thumb_url($content) ?>"/>
            <h3><a href="#"><?php echo get_the_title($post->ID); ?></a></h3>
            <?php if (false) :  // hiding the tags for now ?>
            <?php if ( $posttags = get_the_tags() ) :
              foreach($posttags as $tag) { echo $tag->name . "&nbsp;"; }
            endif; ?>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php wp_reset_query();?>
      </div> <!--/thumb-container-->
    </div> <!--/player-->
    <?php endif;   /**************** END OLD VIDEO AND THUMBNAILS **********/ ?>
    
    <div class="clear"></div>
  </div> <!--/features-->
  
</div> <!--/features-wrapper-->
<?php endif; // only show features on home ?>
  
  <div id="content-wrapper" class="wrapper">
    
    <div id="content" class="section">
        
        <?php if(is_home() && $post==$posts[0] && !is_paged()) : ?>
        <h2 class="mast"><span>Yet Another Beer Blog</span></h2>
        <?php endif; ?>
      
  			<?php
  			/* Run the loop to output the posts.
  			 * If you want to overload this in a child theme then include a file
  			 * called loop-index.php and that will be used instead.
  			 */
  			 get_template_part( 'loop', 'index' );
  			?>
  	</div> <!--/content-->

    <div id="sidebar">
      <?php get_sidebar(); ?>
    </div> <!--/sidebar-->
  
  <div class="clear"></div>
  </div> <!--/content-wrapper-->



  <div id="footer-wrapper" class="wrapper">
    <div id="footer" class="section">
      <h2 class="mast"><span>Yet Even More Stuff</span></h2>
      <?php get_footer(); ?>
    </div> <!--/footer-->
  </div> <!--/footerwrap-->


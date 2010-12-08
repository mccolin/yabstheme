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
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php if(is_home() && $post==$posts[0] && !is_paged()) : ?>
<div id="features-wrapper" class="wrapper">
  
  <div id="features" class="section">
    <div id="intro">
      <h2>We choose the beer and get to drink it, too!</h2>
      <p>
        Welcome to <strong>Yet Another Beer Show</strong>. We give
        you two guys, reviewing one beer, nearly every day of the week.
      </p>
      <p>
        Check out our <strong>latest videos</strong>
        in the player to the right and browse <strong>our beer history</strong> using
        the menu at the top. Welcome!
      </p>
      <p>
        <a href="#">Learn about beer</a> or <a href="#">Watch a video</a>
      </p>
    </div>
    
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
            <img src=" <?php echo extract_youtube_thumb_url($content) ?>"/>
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


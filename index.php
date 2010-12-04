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

<div id="body-wrapper">
  
  <style>
  div#featured div.video {
    display: none;
  }
  </style>

  <div id="featured">
    <?php $temp_query = $wp_query; ?>
    <?php query_posts('category_name=video&showposts=4'); ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="video" id="video-post-<?php the_ID(); ?>">
        <?php if($content = $post->post_content) : ?>
          <?php echo extract_youtube_video($content, 490, 300) ?>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
    <?php wp_reset_query();?>
    
    <div id="featured-thumbs">
    <?php $temp_query = $wp_query; ?>
    <?php query_posts('category_name=video&showposts=4'); ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php if($content = $post->post_content) : ?>
        <a class="thumblink" id="video-thumb-<?php the_ID(); ?>" href="#">
          <img src=" <?php echo extract_youtube_thumb_url($content) ?>" width="96"/>
          <h3><?php echo get_the_title($post->ID); ?></h3>
          <?php if ( $posttags = get_the_tags() ) :
            foreach($posttags as $tag) { echo $tag->name . "&nbsp;"; }
          endif; ?>
        </a>
      <?php endif; ?>
    <?php endwhile; ?>
    <?php wp_reset_query();?>
    </div> <!--/featured-thumbs-->
    
    <div class="clear"></div>
  </div>
  
  
  <div id="content">
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

</div> <!--/bodywrap-->

<div class="clear"></div>

<div id="footer-wrapper">
  <div id="footer">
    <?php get_footer(); ?>
  </div> <!--/footer-->
</div> <!--/footerwrap-->


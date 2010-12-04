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
  
  <?php if (false) : ?>
  <div id="featured">
    <?php
    query_posts('cat=4&posts_per_page=4');
    if(have_posts()) :
      while(have_posts()) :
        the_post();
        ?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <h2><?php get_permalink(); ?></h2>
          <div class="entry">
            <?php $img = get_post_meta($post->ID, 'Featured Thumbnail', true); ?>
            <img src="<?php echo $img; ?>"/>
            <?php the_content('Read More'); ?>
          </div>
        </div>
        <?php
      endwhile;
    endif;
    wp_reset_query();
    ?>
  </div>
  <?php endif; ?>
  
  
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


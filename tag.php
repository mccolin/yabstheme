<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="bodywrap">

  <div id="content">

				<h1><?php
					printf( __( 'Tags / %s', 'twentyten' ), '' . single_tag_title( '', false ) . '' );
				?></h1>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>

  </div> <!--/content-->

  <div id="sidebar">
    <?php get_sidebar(); ?>
  </div> <!--/sidebar-->

</div> <!--/bodywrap-->

<div id="footerwrap">
  <div id="footer">
    <?php get_footer(); ?>
  </div>
</div>

<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="bodywrap">

  <div id="content">

				<h1><?php
					printf( __( 'Topics / %s', 'twentyten' ), '' . single_cat_title( '', false ) . '' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
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
  
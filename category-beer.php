<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="content-wrapper" class="wrapper">
  
  <div id="content" class="section">
    
    <div class="page-content">
			<h1>The Beer List</h1>
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
		</div>
			
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

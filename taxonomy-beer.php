<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="content-wrapper" class="wrapper">
  
  <div id="content" class="section">
    
    <div class="page-content">
			<h1>Beer List: <?php echo "Taxonomy Group"?></h1>

      <?php
      	/* Run the loop for the archives page to output the posts.
      	 * If you want to overload this in a child theme then include a file
      	 * called loop-archives.php and that will be used instead.
      	 */
      	 get_template_part( 'loop', 'archive' );
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

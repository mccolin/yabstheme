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
			
			<p>This page contains a list of the beers we've reviewed on our show. You can
			  find the beer based on its name, type, brewery, or our recommendation. Clicking
			  on a beer will take you to a page describing the beer and displaying the episode
			  in which the beer was featured.<br/><br/>
		  </p>

			<?php
			/* Run the beer loop */
			get_template_part( 'loop', 'beer' );
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


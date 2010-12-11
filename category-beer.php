<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage YetAnotherBeerShow
 * @since YetAnotherBeerShow 0.9
 */

get_header(); ?>

<div id="content-wrapper" class="wrapper">
  
  <div id="content" class="section full-width">
    
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
						
			<p>If you can't find a beer you're looking for, you can always 
			  <a href="/contact">suggest a new beer for us to try on our contact page</a>. We try
			  our best to listen to all requests and bring you the most interesting and original
			  beers we can find that are also accessible.
			</p>
			
		</div>
			
	</div> <!--/content-->

<div class="clear"></div>
</div> <!--/content-wrapper-->


<div id="footer-wrapper" class="wrapper">
  <div id="footer" class="section">
    <h2 class="mast"><span>Yet Even More Stuff</span></h2>
    <?php get_footer(); ?>
  </div> <!--/footer-->
</div> <!--/footerwrap-->


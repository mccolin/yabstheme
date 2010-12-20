<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage YetAnotherBeerShow
 * @since YetAnotherBeerShow 0.9
 */

get_header(); ?>

<div id="content-wrapper" class="wrapper">
  
  <div id="content" class="section full-width">
    
    <div class="page-content">
			<h1><?php printf( __( 'Search Results for: %s', 'twentyten' ), '' . get_search_query() . '' ); ?></h1>
      
      <div class="gallery">
        <?php if ( have_posts() ) :
  			  get_template_part( 'loop', 'search' );
  			else : ?>
  			  <p>
  			    Sorry, we couldn't find anything that matched your search criteria.
  			    Please try again, or <a href="/">start from the beginning</a>.
  			  </p>
				  <?php get_search_form(); ?>
				
  			<?php endif; ?>
			</div>
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


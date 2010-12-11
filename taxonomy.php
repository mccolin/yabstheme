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
 * @subpackage YetAnotherBeerShow
 * @since YetAnotherBeerShow 0.9
 */

get_header(); ?>

<?php
  if ( get_query_var('beer') ) {
    $tax_slug = get_query_var('beer');
    $tax_term = get_term_by('slug', $tax_slug, 'beer');
    $title = "List of $tax_term->name Style Beers";
  }
  elseif ( get_query_var('brewery') ) {
    $tax_slug = get_query_var('brewery');
    $tax_term = get_term_by('slug', $tax_slug, 'brewery');    
    $title = "List of $tax_term->name Brews";
  }
?>


<div id="content-wrapper" class="wrapper">
  
  <div id="content" class="section full-width">
    
    <div class="page-content">
            
			<h1><?php echo $title ?></h1>
      <p>
        See all of the beers we've reviewed in our <a href="/topics/beer">Full Beer List</a>. 
        Recommend a beer for us to try on our <a href="/contact">contact page</a>.
        <br/><br/>
      </p>

      <?php
      	/* Build the beer list loop on this subset of beers */
      	 get_template_part( 'loop', 'beer' );
      ?>

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

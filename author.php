<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

<div id="content-wrapper" class="wrapper">
  
  <div id="content" class="section">
    
    <div class="page-content author-profile">
            
			<h1>Yabber <?php the_author(); ?></h1>
      
      <?php
      // If a user has filled out their description, show a bio on their entries.
      if ( get_the_author_meta( 'description' ) ) : ?>
      <div class="author-bio">
  			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 96 ) ); ?>
  			<h2><?php printf( __( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
  			<?php the_author_meta( 'description' ); ?>
  			<div class="clear"></div>
      </div>
      <?php endif; ?>

      <?php
      	/* Reset the post query and load posts by this author */
      	rewind_posts();
      	get_template_part( 'loop', 'author' );
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





				



<?php get_sidebar(); ?>
<?php get_footer(); ?>
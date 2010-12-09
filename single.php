<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="content-wrapper" class="wrapper">
  
  <div id="content" class="section">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <div class="post">
		<h2><?php the_title(); ?></h2>

    <span class="dateline"><?php twentyten_posted_on(); ?></span>

    <span class="body-content">
		<?php the_content(); ?>
		</span>
		
		<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>


    <span class="postline">
			<?php twentyten_posted_in(); ?>
						
			<?php edit_post_link( __( 'Authors: Edit this Post', 'twentyten' ), '', '' ); ?>
		</span>

    <div class="prev-next-links">
			<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
			<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>
			<div class="clear"></div>
		</div>

    <div class="post-comments">
			<?php comments_template( '', true ); ?>
		</div>
		
	</div> <!--/post-->

<?php endwhile; // end of the loop. ?>

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



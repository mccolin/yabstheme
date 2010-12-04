<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="body-wrapper">
  
  <div id="content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<h1><?php the_title(); ?></h1>

          <div class="leader">
						<?php twentyten_posted_on(); ?>
					</div>

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
  <?php if (false) : ?>
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
							<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s &rarr;', 'twentyten' ), get_the_author() ); ?>
							</a>
	<?php endif; ?>
<?php endif; ?>

      <div class="trailer">
				<?php twentyten_posted_in(); ?>
						
				<?php edit_post_link( __( 'Authors: Edit this Post', 'twentyten' ), '', '' ); ?>
			</div>

      <div class="prev-next-links">
				<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
				<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>
			</div>

      <div class="post-comments">
				<?php comments_template( '', true ); ?>
			</div>

<?php endwhile; // end of the loop. ?>

  </div> <!--/content-->

  <div id="sidebar">
    <?php get_sidebar(); ?>
  </div> <!--/sidebar-->

</div> <!--/bodywrap-->

<div id="footer-wrapper">
  <div id="footer">
    <?php get_footer(); ?>
  </div>
</div>


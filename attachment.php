<?php
/**
 * The template for displaying attachments.
 *
 * @package WordPress
 * @subpackage YetAnotherBeerShow
 * @since YetAnotherBeerShow 0.9
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="content-wrapper" class="wrapper">
  
  <div id="content" class="section full-width">

  <div class="post">
		<h2><?php the_title(); ?></h2>

    <span class="dateline"><?php twentyten_posted_on(); ?></span>

    <span class="body-content">
		<?php the_content(); ?>
		
    
    <?php if ( wp_attachment_is_image() ) :
    	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
    	foreach ( $attachments as $k => $attachment ) {
    		if ( $attachment->ID == $post->ID )
    			break;
    	}
    	$k++;
    	// If there is more than 1 image attachment in a gallery
    	if ( count( $attachments ) > 1 ) {
    		if ( isset( $attachments[ $k ] ) )
    			// get the URL of the next image attachment
    			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
    		else
    			// or get the URL of the first image attachment
    			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
    	} else {
    		// or, if there's only 1 image attachment, get the URL of the image
    		$next_attachment_url = wp_get_attachment_url();
    	}
    ?>
    						<p><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
    							$attachment_size = apply_filters( 'twentyten_attachment_size', 900 );
    							echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
    						?></a></p>

    							<?php previous_image_link( false ); ?>
    							<?php next_image_link( false ); ?>
    <?php else : ?>
    						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
    <?php endif; ?>
    						<?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?>
    
    

		<a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php esc_attr( printf( __( 'Return to %s', 'twentyten' ), get_the_title( $post->post_parent ) ) ); ?>" rel="gallery">
		<?php printf( __( '<span>&larr;</span> Appears in %s', 'twentyten' ), get_the_title( $post->post_parent ) ); ?></a>
		
		<?php	if ( wp_attachment_is_image() ) : 
			$metadata = wp_get_attachment_metadata();
			printf( __( 'Full size is %s pixels', 'twentyten'),
				sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
					wp_get_attachment_url(),
					esc_attr( __('Link to full-size image', 'twentyten') ),
					$metadata['width'],
					$metadata['height']
				)
			);
		endif; ?>
    
		</span>
		
		<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>


    <span class="postline">
			<?php twentyten_posted_in(); ?>
						
			<?php edit_post_link( __( 'Edit this File', 'twentyten' ), '', '' ); ?>
		</span>

    <div class="prev-next-links">
			<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'twentyten' ) . ' %title' ); ?>
			<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '' ); ?>
			<div class="clear"></div>
		</div>

		
	</div> <!--/post-->

  </div> <!--/content-->
  <div class="clear"></div>
</div> <!--/content-wrapper-->


<div id="comments-wrapper" class="wrapper">
  <div id="comments-section" class="section">
    <h2 class="mast"><span>Discuss <?php the_title(); ?></span></h2>
    
    <div class="post-comments">
			<?php comments_template( '', true ); ?>
		</div>
		    
  </div>
</div>

<?php endwhile; ?>


<div id="footer-wrapper" class="wrapper">
  <div id="footer" class="section">
    <h2 class="mast"><span>Yet Even More Stuff</span></h2>
    <?php get_footer(); ?>
  </div> <!--/footer-->
</div> <!--/footerwrap-->


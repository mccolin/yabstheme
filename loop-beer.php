<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<?php
  /* Adjust the video gallery to shown 12 episodes per page */
  $page = get_query_var('paged');
  query_posts($query_string . '&cat=4&posts_per_page=12&paged='. $page );
?>


<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php while ( have_posts() ) : the_post(); ?>
  
  <?php if($content = $post->post_content) : ?>
  <div class="video" id="video-<?php the_ID(); ?>">
    <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title($post->ID); ?></a></h3>
    <div class="clip">
      <a href="<?php the_permalink(); ?>"><img id="img-<?php the_ID(); ?>" src="<?php echo extract_youtube_thumb_url($content) ?>"/></a>
    </div>
    <div class="excerpt">
      <span class="dateline"><?php the_time(get_option('date_format')); ?></span>
      <?php the_excerpt(); ?>
    
      <?php if (false) :  // hiding the tags for now ?>
      <?php if ( $posttags = get_the_tags() ) :
        foreach($posttags as $tag) { echo $tag->name . "&nbsp;"; }
      endif; ?>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>


<?php endwhile; // End the loop. Whew. ?>



<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <div class="prev-next-links">
		<?php next_posts_link( __( 'Next Page &rarr;', 'twentyten' ) ); ?>
		<?php previous_posts_link( __( '&larr; Previous Page', 'twentyten' ) ); ?>
	</div>
<?php endif; ?>



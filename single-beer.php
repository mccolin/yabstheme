<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="content-wrapper" class="wrapper">
  
  <div id="content" class="section">



  <div class="post">
		<h2><?php the_title(); ?></h2>

    <span class="dateline"><?php twentyten_posted_on(); ?></span>

    <span class="body-content">
		<?php the_content(); ?>
		</span>
		
		<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>


    <span class="postline">
			<?php twentyten_posted_in(); ?>
						
			<?php edit_post_link( __( 'Edit this Post', 'twentyten' ), '', '' ); ?>
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



  </div> <!--/content-->

  <div id="sidebar">
    <!-- Simulated Widget Region -->
		<ul class="xoxo">

      <!-- Simulated Widget: Beer Facts -->
  		<li class="widget-container beer_facts" id="beer-facts">
  		  <?php
  		    /* Taxonomy facts: Style and Brewer */
  		    $style_terms = get_the_term_list( $post->ID, 'beer', '', ' and ', '');
  		    $brewery_terms = get_the_term_list( $post->ID, 'brewery', '', ' and ', '');
  		    
  		    /* Custom Field Facts: */
  		    $fields = get_post_custom( $post->ID );
  		    $beer_name = $fields['yabs_beer_name'][0];
  		    $beer_abv = $fields['yabs_beer_abv'][0];
  		    $beer_avail = $fields['yabs_beer_avail'][0];
  		    $beer_notes = $fields['yabs_beer_notes'][0];
  		  ?>
  		  
  		  <h3 class="widget-title">About <?php if ($beer_name) { echo $beer_name; } else { echo "the Beer"; } ?></h3>
		  
  		  <table class="beer-facts">
  		    <tr>
  		      <th>Style:</th>
  		      <td><?php if ($style_terms) { echo $style_terms; } else { echo "Mystery"; } ?></td>
  		    </tr>
  		    <tr>
  		      <th>Brewery:</th>
  		      <td><?php if ($brewery_terms) { echo $brewery_terms; } else { echo "Not Sure"; } ?></td>
  		    </tr>
  		    <tr>
  		      <th>ABV:</th>
  		      <td><?php if ($beer_abv) { echo $beer_abv . "%"; } else { echo "Unknown"; } ?></td>
  		    </tr>
  		    <tr>
  		      <th>Availability:</th>
  		      <td><?php if ($beer_avail) { echo $beer_avail; } else { echo "Unknown"; } ?></td>
  		    </tr>  		    
        </table>
  		  
  		</li>
  		
  		<!-- Simulated Widget: Review Facts -->
  		<li class="widget-container review_details" id="review-details">
  		  <h3 class="widget-title">Our Review</h3>
  		  <?php
    		  /* Custom Field Facts for Review: */
  		    $beer_reviewer1 = $fields['yabs_reviewer1'][0];
  		    $beer_reviewer2 = $fields['yabs_reviewer2'][0];
  		    $beer_reviewer_guests = $fields['yabs_reviewer_guests'][0];
  		    $beer_recommend1 = $fields['yabs_recommend1'][0];
  		    $beer_recommend2 = $fields['yabs_recommend2'][0];
		    ?>
  		  
  		  <table class="beer-facts">
          <h4>Reviewed by</h4>
		        <p><?php 
		          if ($beer_reviewer1) { 
		            echo $beer_reviewer1; 
		            if ($beer_reviewer2) { echo " and " . $beer_reviewer2; }
		            if ($beer_reviewer_guests) { echo " with " . $beer_reviewer_guests; }
		          }
		          else { echo "Yet Another Beer Show"; }
		        ?></p>

  		    <?php if ($beer_reviewer1) :?>
          <h4><?php echo $beer_reviewer1 ?>'s Judgement:</h4>
  		    <p><?php echo $beer_recommend1 ?></p>

  		      <?php if ($beer_reviewer2) :?>
		        <h4><?php echo $beer_reviewer2 ?>'s Judgement:</h4>
    		    <p><?php echo $beer_recommend2 ?></p>
    		    <?php endif;
    		  endif; ?>
    		  
    		  <?php if ($beer_notes) :?>
    		  <h4>Notes <?php if ($beer_name) { echo " on " . $beer_name; } ?></h4>
  		    <p><?php echo $beer_notes; ?></p>
  		    <?php endif; ?>
        </table>
  		  
  		  
      </li>
      
      <?php if(false) :?>
      <!-- Simulated Widget: Beer Photo -->
      <li class="widget-container beer_media" id="beer_media">
        <h3 class="widget-title">Media</h3>
        <p>No media.</p>
      </li>
      <?php endif; ?>
      
    </ul><!--/widget region-->


  </div> <!--/sidebar-->
  
  <div class="clear"></div>
</div> <!--/content-wrapper-->

<?php endwhile; // end of the loop. ?>




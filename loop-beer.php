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
  /* On the beer loop, we want to show all beers on a single page. We still pull
   * the page from query in case this behavior changes in the future */
  $page = get_query_var('paged');
  query_posts($query_string . "&category_name=beer&posts_per_page=-1&paged=$page" );
  
  /* Crib Sheet for Query Post Adjustments
   *  meta_key=yabs_beer_abv
   *  orderby: meta_value, meta_value_num, date, title, author, rand, comment_count
   *  order: ASC, DESC
   *  meta_key, meta_value, meta_compare("=","!=",">",etc.)
   */
?>


<table id="big-beer-list">
  <tr>
    <th>Beer</th>
    <th>Brewery</th>
    <th>Style</th>
    <th>Availability</th>
    <th>ABV</th>
    <th>Reviewers</th>
    <th class="rec">JT</th>
    <th class="rec">Colin</th>
    <th class="rec">Steve</th>
    <th class="rec">Kasey</th>
    <th class="rec">Chris</th>
  </tr>
  
<?php /* Loop through each of the beers */ ?>
<?php while ( have_posts() ) : the_post(); ?>
  
  <?php
  /* Taxonomy facts: Style and Brewer */
  $style_terms = get_the_term_list( $post->ID, 'beer', '', ', ', '');
  $brewery_terms = get_the_term_list( $post->ID, 'brewery', '', ', ', '');
  
  /* Custom Field Facts: */
  $fields = get_post_custom( $post->ID );
  $beer_name = $fields['yabs_beer_name'][0];
  $beer_abv = $fields['yabs_beer_abv'][0];
  $beer_avail = $fields['yabs_beer_avail'][0];  
  $beer_reviewer1 = $fields['yabs_reviewer1'][0];
  $beer_reviewer2 = $fields['yabs_reviewer2'][0];
  $beer_reviewer_guests = $fields['yabs_reviewer_guests'][0];
  $beer_recommend1 = $fields['yabs_recommend1'][0];
  $beer_recommend2 = $fields['yabs_recommend2'][0];  
  ?>
  
  <?php if($beer_name) :?>
  
  <tr>
    <td><a href="<?php the_permalink(); ?>"><?php echo $beer_name ?></a></td>
    <td><?php if ($brewery_terms) { echo $brewery_terms; } else { echo "Not Sure"; } ?></td>
    <td><?php if ($style_terms) { echo $style_terms; } else { echo "Mystery"; } ?></td>
    <td><?php if ($beer_avail) { echo $beer_avail; } else { echo "Unknown"; } ?></td>
    <td><?php if ($beer_abv) { echo $beer_abv . "%"; } else { echo "Unknown"; } ?></td>
    <td>
      <!-- Reviewers -->
      <?php 
        if ($beer_reviewer1) { 
          echo $beer_reviewer1; 
          if ($beer_reviewer2) { echo ", " . $beer_reviewer2; }
          if ($beer_reviewer_guests) { echo " with guests"; }
        }
        else { echo "The Show"; }
      ?>
    </td>
    <td class="rec">
      <!-- JT's Recommendation -->
      <img src="<?php echo recommendation_image_from_reviewer("JT", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>" title="JT <?php echo recommendation_from_reviewer("JT", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>"/>
    </td>
    <td class="rec">
      <!-- Colin's Recommendation -->
      <img src="<?php echo recommendation_image_from_reviewer("Colin", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>" title="Colin <?php echo recommendation_from_reviewer("Colin", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>"/>
    </td>
    <td class="rec">
      <!-- Steve's Recommendation -->
      <img src="<?php echo recommendation_image_from_reviewer("Steve", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>" title="Steve <?php echo recommendation_from_reviewer("Steve", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>"/>
    </td>
    <td class="rec">
      <!-- Kasey's Recommendation -->
      <img src="<?php echo recommendation_image_from_reviewer("Kasey", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>" title="Kasey <?php echo recommendation_from_reviewer("Kasey", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>"/>
    </td>
    <td class="rec">
      <!-- Chris' Recommendation -->
      <img src="<?php echo recommendation_image_from_reviewer("Chris", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>" title="Chris <?php echo recommendation_from_reviewer("Chris", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>"/>
    </td>
  </tr>
  
  <?php endif; ?>
  
  

<?php endwhile; // End the loop. Whew. ?>
</table>


<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <div class="prev-next-links">
		<?php next_posts_link( __( 'Next Page &rarr;', 'twentyten' ) ); ?>
		<?php previous_posts_link( __( '&larr; Previous Page', 'twentyten' ) ); ?>
	</div>
<?php endif; ?>



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
 * @subpackage YetAnotherBeerShow
 * @since YetAnotherBeerShow 0.9
 */
?>

<script src="<?php echo get_bloginfo('template_url') . "/js/tablesort.js"; ?>"></script>

<script>

function yabsRecSortPrepareData(tdNode, innerText) {
  var images = tdNode.getElementsByTagName("img");
  var data = images.length ? images[0].title : "";
  return data;
}

function yabsRecSort(rowA, rowB) {
  var recOrder = ["Highly Recommends","Recommends","Recommends with Conditions","Does Not Recommend","Did Not Review"];
  var cellA = rowA[fdTableSort.pos].replace(/^\S+\s+/gi, "");
  var cellB = rowB[fdTableSort.pos].replace(/^\S+\s+/gi, "");
      
  //alert("Comparing \n|"+cellA+"|(idx"+recOrder.indexOf(cellA)+")\n -to- \n|"+cellB+"|(idx"+recOrder.indexOf(cellB)+")");
  if ( recOrder.indexOf(cellA) == recOrder.indexOf(cellB) ) return 0;
  if ( recOrder.indexOf(cellA) < recOrder.indexOf(cellB) ) return -1;
  return 1;
}

function sortInitiatedCallback() {}
function sortCompleteCallback() {}

</script>

<?php
  /* On the beer loop, we want to show all beers on a single page. We still pull
   * the page number from query in case this behavior changes in the future */
  $page = get_query_var('paged');
  
  /*
  $orderby = get_query_var('orderby');
  $order = get_query_var('order');
  if ($orderby == "beer_name") { $orderby == "meta_value"; $meta_key == "yabs_beer_name"; }
  elseif ($orderby == "abv") { $orderby = "meta_value_num"; $meta_key == "yabs_beer_abv"; }
  elseif ($orderby == "avail") { $orderby == "meta_value"; $meta_key == "yabs_beer_avail"; }
  */
  
  /* Default settings for any beer list: */
  $args = array(
    'category_name' => 'beer',
    'posts_per_page' => -1,
    'paged' => $page
  );
  
  /* Add support in this loop for taxonomy searches, if set: */
  if ( $tax_slug = get_query_var('beer') ) {
    $tax_term = get_term_by('slug', $tax_slug, 'beer');
    $args['beer'] = $tax_slug;
  }
  elseif ( $tax_slug = get_query_var('brewery') ) {
    $tax_term = get_term_by('slug', $tax_slug, 'brewery');
    $args['brewery'] = $tax_slug;
  }
  
  /* Finally perform the query for this beer list: */  
  query_posts( $args );
  
  /* Crib Sheet for Query Post Adjustments
   *  meta_key=yabs_beer_abv
   *  orderby: meta_value, meta_value_num, date, title, author, rand, comment_count
   *  order: ASC, DESC
   *  meta_key, meta_value, meta_compare("=","!=",">",etc.)
   */
?>

<table id="big-beer-list">
  <tr>
    <th class="sortable-text">Beer</th>
    <th class="sortable-text">Brewery</th>
    <th class="sortable-text">Style</th>
    <th class="sortable-text">Availability</th>
    <th class="sortable-numeric">ABV</th>
    <th class="sortable-text">Reviewers</th>
    <th class="rec sortable-yabsRecSort">JT</th>
    <th class="rec sortable-yabsRecSort">Steve</th>
    <th class="rec sortable-yabsRecSort">Colin</th>
    <th class="rec sortable-yabsRecSort">Kasey</th>
    <th class="rec sortable-yabsRecSort">Chris</th>
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
    <td><?php if ($style_terms) { echo $style_terms; } else { echo "N/A"; } ?></td>
    <td><?php if ($beer_avail) { echo $beer_avail; } else { echo "N/A"; } ?></td>
    <td><?php if ($beer_abv) { echo $beer_abv . "%"; } else { echo "N/A"; } ?></td>
    <td>
      <!-- Reviewers -->
      <?php 
        if ($beer_reviewer1) { 
          echo $beer_reviewer1; 
          if ($beer_reviewer2) { echo ", " . $beer_reviewer2; }
          elseif ($beer_reviewer_guests) { echo " with guests"; }
        }
        else { echo "The Show"; }
      ?>
    </td>
    <td class="rec">
      <!-- JT's Recommendation -->
      <img src="<?php echo recommendation_image_from_reviewer("JT", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>" title="JT <?php echo recommendation_from_reviewer("JT", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>"/>
    </td>
    <td class="rec">
      <!-- Steve's Recommendation -->
      <img src="<?php echo recommendation_image_from_reviewer("Steve", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>" title="Steve <?php echo recommendation_from_reviewer("Steve", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>"/>
    </td>
    <td class="rec">
      <!-- Colin's Recommendation -->
      <img src="<?php echo recommendation_image_from_reviewer("Colin", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>" title="Colin <?php echo recommendation_from_reviewer("Colin", $beer_reviewer1, $beer_reviewer2, $beer_recommend1, $beer_recommend2); ?>"/>
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

<br/><br/>

<p>
  <table id="beer-list-legend">
    <tr>
      <th><strong>Review Key:</strong></th>
      <td><img src="<?php echo get_bloginfo('template_url') . "/images/rec_high.png"; ?>"/> Highly Recommended</td>
      <td><img src="<?php echo  get_bloginfo('template_url') . "/images/rec_norm.png"; ?>"/> Recommended</td>
      <td><img src="<?php echo get_bloginfo('template_url') . "/images/rec_cond.png"; ?>"/> Recommend, with Conditions</td>
      <td><img src="<?php echo get_bloginfo('template_url') . "/images/rec_no.png"; ?>"/> Not Recommended</td>
    </tr>
  </table>
  <br/><br/>
</p>



<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <div class="prev-next-links">
		<?php next_posts_link( __( 'Next Page &rarr;', 'twentyten' ) ); ?>
		<?php previous_posts_link( __( '&larr; Previous Page', 'twentyten' ) ); ?>
	</div>
<?php endif; ?>



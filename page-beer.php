<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<div id="content-wrapper" class="wrapper">

  <div id="content" class="section">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <div class="page-content">
				<h1><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				
				<table>
				  <tr>
				    <td>Date</td>
				    <td>Beer</td>
				    <td>Type</td>
				    <td>Brewery</td>
				  </tr>
				<?php
        $args = array(
          'category' => 3,
        	'posts_per_page' => -1,
        	'orderby' => 'date',
        	'order' => 'DESC'
        	); 
        $beers = get_posts($args);
        foreach ($beers as $beer_post) : ?>
        
        <tr>
          <td colspan="4">

          </td>
        </tr>
			  <tr>
			    <td><?php echo $beer_post->post_date ?></td>
			    <td><?php echo $beer_post->post_title ?></td>
			    <td><em>Beer Type</em></td>
			    <td><em>Brewery</em></td>
			  </tr>
        <?php endforeach; ?>
				</table>
				
				<!--
				$post->post_author
        $post->post_date
        $post->post_date_gmt
        $post->post_content
        $post->post_content_filtered
        $post->post_title
        $post->post_excerpt
        $post->post_status
        $post->post_type
        $post->comment_status
        $post->ping_status
        $post->post_password
        $post->post_name
        $post->to_ping
        $post->pinged
        $post->post_modified
        $post->post_modified_gmt
        $post->post_parent
        $post->menu_order
        $post->guid
        -->
				
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>

			</div>

    <?php endwhile; ?>
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


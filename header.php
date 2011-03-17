<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage YetAnotherBeerShow
 * @since YetAnotherBeerShow 0.9
 */
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php if (have_posts()):while(have_posts()):the_post();endwhile;endif;?>
<!-- Facebook Opengraph -->
  <meta property="fb:app_id" content="166816876688879" />
  <meta property="fb:admins" content="11308679,10603565" />
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<?php if (is_single()) { ?>
  <meta property="og:title" content="<?php single_post_title(''); ?>" />
  <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
  <meta name="description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?php the_permalink() ?>"/>
  <?php if ( in_category("video", $post) ):?>
  <meta property="og:image" content="<?php echo extract_youtube_thumb_url($post->post_content) ?>" />
  <meta property="og:video" content="<?php echo extract_youtube_video_url($post->post_content) ?>"/>
  <meta property="og:video:height" content="250" /> 
  <meta property="og:video:width" content="400" />
  <?php else :?>
    <?php if ( $thumb_id = get_post_thumbnail_id($post->ID) ) {?>
  <meta property="og:image" content="<?php echo wp_get_attachment_thumb_url($thumb_id) ?>" />
    <?php } else { ?>
  <meta property="og:image" content="<?php bloginfo('template_url') ?>/images/yabslogoribbon.png" />
    <?php } ?>
  <?php endif; ?>
<?php } else { ?>
  <meta property="og:url" content="<?php bloginfo('url') ?>"/>
  <meta property="og:description" content="<?php bloginfo('description'); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="<?php bloginfo('template_url') ?>/images/yabslogoribbon.png" />
  <meta name="description" content="<?php bloginfo('description'); ?>" />
<?php } ?>
<?php rewind_posts(); ?>
<?php wp_reset_query(); ?>

  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!-- YABS Scripts -->
  <script src="http://www.google.com/jsapi"></script> 
  <script> 
    /* Load the JQuery and SWFObject library through Google JSAPIs */
    google.load("jquery", "1.4.4");
    google.load("swfobject", "2.1");
  </script>
  <script type="text/javascript" src="<?php echo get_bloginfo('template_url') . "/js/yabs_youtube_player.js" ?>"></script>
  <script type="text/javascript" src="<?php echo get_bloginfo('template_url') . "/js/yabs_youtube_hacks.js" ?>"></script>
  <script type="text/javascript" src="<?php echo get_bloginfo('template_url') . "/js/yabs_ticker.js" ?>"></script>

<?php
	/* Support threaded comments on comment pages: */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Allow themes and plugins to hook into the head section: */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

  <div id="ticker-wrapper" class="wrapper">
    <div id="ticker" class="section">
      <span style="display: none;">
      <?php 
      $page = get_page_by_title('Ticker');
      echo $page->post_content;
      ?>
      </span>
    </div> <!--/ticker-->
  </div> <!--/ticker-wrapper-->

  <div id="header-wrapper" class="wrapper">
    <div id="header" class="section">
      <h1>
    		<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
    		  <!--OLD LOGO img src="<?php echo get_bloginfo('template_url'); ?>/images/yabs_logo_small.png" alt="<?php bloginfo( 'name' ); ?>"/-->
    		  <img src="<?php echo get_bloginfo('template_url'); ?>/images/yabslogotxt.png" alt="<?php bloginfo( 'name' ); ?>"/>
    		  <span><?php bloginfo( 'name' ); ?></span>
    		</a>
    	</h1>
  	
  		<?php wp_nav_menu( array( 'container_class' => 'navigation-container', 'theme_location' => 'primary' ) ); ?>
    	
    </div> <!--/header-->
  </div> <!--/header-wrapper-->



	

	
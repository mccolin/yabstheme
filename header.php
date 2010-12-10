<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_bloginfo('template_url') . "/js/yabs_youtube_hacks.js" ?>"></script>
  <script type="text/javascript" src="<?php echo get_bloginfo('template_url') . "/js/yabs_ticker.js" ?>"></script>

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
    		  <img src="<?php echo get_bloginfo('template_url'); ?>/images/yabs_logo_small.png" alt="<?php bloginfo( 'name' ); ?>"/>
    		  <span><?php bloginfo( 'name' ); ?></span>
    		</a>
    	</h1>
  	
  		<?php wp_nav_menu( array( 'container_class' => 'navigation-container', 'theme_location' => 'primary' ) ); ?>
    	
    </div> <!--/header-->
  </div> <!--/header-wrapper-->



	

	
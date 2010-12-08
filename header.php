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
  <script type="text/javascript"> 
  
  // Function controlling the news story ticker at page top
  function fetchTickerStory() {
    var rand = Math.floor(Math.random()*3);
    if (rand == 0)
      $("#ticker").html("Colin and Kasey explore the deliciousness of Chimay Grande Reserve. <a href='#'>Watch now</a>.");
    else if (rand == 1)
      $("#ticker").html("Does a beer with raisins taste any good? <a href='#'>We try one</a>. <a href='#'>And another</a>.");
    else if (rand == 2)
      $("#ticker").html("Steve and JT get started brewing at home. It's a homebrew crash course. <a href='#'>Check it out</a>!");
    setTimeout("fetchTickerStory();", 5000);
    return(false);
  }
  
  $(document).ready(function() {	
    //Show the first featured video and activate its thumbnail:
    $("#features .video:first").show();    
    $("#thumb-container .thumb:first").addClass("active");
    
    // Add click actions to all of the featured video thumbs
    $("#thumb-container .thumb").click(function(){
      var thumbId = $(this).attr("id");
      var vidId = thumbId.replace("thumb","video");
      $("#features .video").hide();
      $("#"+vidId).show();
      $("#thumb-container .thumb").removeClass("active");
      $("#"+thumbId).addClass("active");
    });   
    
    // Kickoff the story ticker at page-top
    setTimeout("fetchTickerStory();", 5000);
    
  });// end ready()
  </script>

</head>

<body <?php body_class(); ?>>

  <div id="ticker-wrapper" class="wrapper">
    <div id="ticker" class="section">
      JT and Steve review the latest from Ommegang. <a href="#">Watch the video here</a>.
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



	

	
<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage YetAnotherBeerShow
 * @since YetAnotherBeerShow 0.9
 */
?>

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

  <div class="clear"></div>

  <div id="footnote">
		<strong><a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></strong>
		is powered by
		<strong><a href="http://wordpress.org/" title="Semantic Personal Publishing Platform" rel="generator">WordPress </a></strong>
		and
		<strong>9.25% ABV</strong>
	</div>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>

<!-- MixPanel -->
<script type='text/javascript'>
  var mp_protocol = (('https:' == document.location.protocol) ? 'https://' : 'http://'); 
  document.write(unescape('%3Cscript src="' + mp_protocol + 'api.mixpanel.com/site_media/js/api/mixpanel.js" type="text/javascript"%3E%3C/script%3E')); 
</script> 
<script type='text/javascript'> 
  try {  var mpmetrics = new MixpanelLib('c62d6b4ecb9835e7b23f82b80fca330a'); } 
  catch(err) { 
    null_fn = function () {}; 
    var mpmetrics = {  track: null_fn,  track_funnel: null_fn,  register: null_fn,  register_once: null_fn, register_funnel: null_fn }; 
  } 
</script>
</body>
</html>
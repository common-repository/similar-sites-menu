<?php
	/* 
	Plugin Name: Similar sites menu
	Plugin URI: http://www.pcdays.cz/2013/07/wordpress-plugin-similar-sites-menu/
	Description: This plugin adds fullwidth menu on top of every page with links that you choose. It may be sites with similar content, subdomain sites or whatever you want... 
	Version: 1.1 
	Author: Petr Vocelka
	Author URI: http://www.pcdays.cz/petr-vocelka-o-mne/ 
	*/
	function similar_sites_menu_function(){
?>
	<link rel='stylesheet' type='text/css' href='/wp-content/plugins/similar-sites-menu/style.css' />

	<style>
	   #similar_sites{background-color: #<?php echo get_option('similar_sites_stripeBg'); ?>;}
	   #my_similar_sites{width: <?php echo get_option('similar_sites_stripeWidth'); ?>;}
	   #my_similar_sites li a {background-color: #<?php echo get_option('similar_sites_linkBg'); ?>; color: #<?php echo get_option('similar_sites_linkColor'); ?>;}
	   #my_similar_sites li a:hover {background-color: #<?php echo get_option('similar_sites_linkHoverBg'); ?>; color: #<?php echo get_option('similar_sites_linkHoverColor'); ?>;}
	</style>

	<div id="similar_sites"><div id="my_similar_sites"><?php wp_nav_menu( array( 'theme_location' => 'similar-sites-menu' )); ?></div></div>

	<script>
	jQuery(function($) { 
		$('#similar_sites').prependTo("body"); 
	});
	
	// If new tab checkbox is checked, then all links will be opened in new tab
	<?php if(get_option('similar_sites_new_tab') == "checked"){ ?>
		jQuery(function($) { 
			$('#similar_sites').find('a').attr('target','_blank');
		});
	<? } ?>
	</script>
<?}
	add_action('wp_head', 'similar_sites_menu_function');

	/* Menu register */
	function register_similar_menu() { 
		register_nav_menus(
			array('similar-sites-menu' => __( 'Similar sites menu')
		));
	}
	add_action( 'init', 'register_similar_menu' );
	wp_enqueue_script('jscolor.js', '/wp-content/plugins/similar_sites_menu/jscolor/jscolor.js'); //color picker for '#' value fields
	/* ADMIN */
	function similar_sites_admin(){ include('similar_sites_admin.php'); }
	function similar_sites_admin_actions(){ add_options_page("similar_sites menu", "Similar sites menu", 1, "similar_sites_admin", "similar_sites_admin"); }
	add_action('admin_menu', 'similar_sites_admin_actions');
?>
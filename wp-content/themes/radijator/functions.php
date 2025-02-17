<?php 

define( 'RADIJATOR_THEME_PATH', get_stylesheet_directory() );
define( 'RADIJATOR_THEME_URI', get_stylesheet_directory_uri() );

require_once 'includes/load_assets.php';
include_once 'includes/post-types.php';
include_once 'includes/nav_walker.php';

/**
 * Load Font Awesome css.
 */
function r_99bitcoins_enqueue_styles() {
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css', array(), '6.6.0' );
}

add_action( 'wp_enqueue_scripts', 'r_99bitcoins_enqueue_styles', 15 );

add_filter( 'show_admin_bar', '__return_false' );



/**
 * Add Theme Support.
 */
if ( ! function_exists( 'radijator_setup' ) ) {
	function radijator_setup() {
		register_nav_menus(
			array(
				'header_menu' => __( 'Header Menu', 'radijator' ),
				'products_menu' => __( 'Products Menu', 'radijator' ),
				'footer_menu' => __( 'Footer Menu', 'radijator' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'radijator_setup' );
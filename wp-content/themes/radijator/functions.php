<?php 

define( 'RADIJATOR_THEME_PATH', get_stylesheet_directory() );
define( 'RADIJATOR_THEME_URI', get_stylesheet_directory_uri() );

require_once 'includes/load_assets.php';
include_once 'includes/post-types.php';
include_once 'includes/nav_walker.php';

add_theme_support('post-thumbnails');
add_theme_support('editor-styles');
add_editor_style( 'editor-style.css' );



/**
 * Load Font Awesome css.
 */
function r_enqueue_styles() {
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css', array(), '6.6.0' );
	wp_enqueue_style( 'swiper-slider-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');

	
}

add_action( 'wp_enqueue_scripts', 'r_enqueue_styles', 15 );


function r_external_sources() {
	wp_enqueue_script( 'swiper-slider-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '', true );
}

add_action( 'wp_enqueue_scripts', 'r_external_sources', 16 );


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

/* Breadcrumbs */
function custom_breadcrumbs() {
    $home = 'Home';
    $blog = 'Products'; 

    echo '<ul class="breadcrumb">';
    echo '<li><a href="' . home_url() . '">' . $home . '</a></li>';

    if (is_category() || is_single()) {
        echo '<li><a href="' . get_permalink(get_option('page_for_posts')) . '">' . $blog . '</a></li>';
        if (is_single()) {
            echo '<li>'. get_the_title().'</li>';
        }
    }
    echo '</ul>';
}

/* body class term name */
function term_name_body_classes($classes) {
    if (is_singular('product')) {
        $terms = get_the_terms(get_the_ID(), 'product_category');
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $classes[] = 'article' . sanitize_title($term->term_id);
            }
        }
    }
    return $classes;
}
add_filter('body_class', 'term_name_body_classes');




function r_register_acf_blocks() {
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    register_block_type( __DIR__ . '/template-parts/blocks/products' );
	register_block_type( __DIR__ . '/template-parts/blocks/services' );
	register_block_type( __DIR__ . '/template-parts/blocks/about' );
	register_block_type( __DIR__ . '/template-parts/blocks/search' );
	register_block_type( __DIR__ . '/template-parts/blocks/process' );
}
// Here we call our tt3child_register_acf_block() function on init.
add_action( 'init', 'r_register_acf_blocks' );




